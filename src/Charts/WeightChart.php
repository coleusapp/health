<?php

namespace Coleus\Health\Charts;

use Carbon\CarbonPeriod;
use Coleus\Health\Models\Weight;
use Coleus\Health\Settings\GeneralSettings;
use Coleus\Widgets\ChartWidget;
use Illuminate\Support\Collection;

class WeightChart extends ChartWidget
{
    public static function getDefault(): array
    {
        return [
            'max_weight' => 0,
            'min_weight' => 0,
            'avg_weight' => 0,
        ];
    }

    public static function getMonthlyRange(): Collection
    {
        return collect(
            CarbonPeriod::start(now()->subMonths(11))
                ->month()
                ->end(now())
        );
    }

    public static function getDailyRange(): Collection
    {
        return collect(
            CarbonPeriod::start(now()->subDays(29))
                ->day()
                ->end(now())
        );
    }

    private static function aggregate(Collection $weights): array
    {
        return [
            'max_weight' => round($weights->max('weight'), 2),
            'min_weight' => round($weights->min('weight'), 2),
            'avg_weight' => round($weights->avg('weight'), 2),
        ];
    }

    private static function monthlyQuery(): Collection
    {
        $timezone = 'America/Denver';

        return Weight::whereBetween('date', [now()->subMonths(11), now()])
            ->orderBy('created_at')
            ->get()
            ->groupBy(fn (Weight $weight) => $weight->date->clone()->setTimezone($timezone)->format('n'))
            ->map(fn (Collection $weights) => static::aggregate($weights));
    }

    private static function dailyQuery(): Collection
    {
        $timezone = 'America/Denver';

        return Weight::whereBetween('date', [now()->subDays(29), now()])
            ->orderBy('created_at')
            ->get()
            ->groupBy(fn (Weight $weight) => $weight->date->clone()->setTimezone($timezone)->format('Y-m-d'))
            ->map(fn (Collection $weights) => static::aggregate($weights));
    }

    public static function getData(string $period = 'monthly'): array
    {
        $isDaily = $period === 'daily';

        $query = $isDaily ? static::dailyQuery() : static::monthlyQuery();
        $range = $isDaily ? static::getDailyRange() : static::getMonthlyRange();
        $key = $isDaily ? fn ($date) => $date->format('Y-m-d') : fn ($date) => $date->month;

        $last = static::getDefault();
        $newData = $range->mapWithKeys(function ($date) use (&$last, $query, $key) {
            $dateKey = $key($date);
            $current = $query[$dateKey] ?? static::getDefault();
            $mapped = [
                'max_weight' => max($current['max_weight'], $last['max_weight']),
                'min_weight' => max($current['min_weight'], $last['min_weight']),
                'avg_weight' => max($current['avg_weight'], $last['avg_weight']),
            ];
            $last = $current;

            return [
                $dateKey => $mapped,
            ];
        });

        return [
            'options' => [
                'responsive' => true,
            ],
            'datasets' => [
                [
                    'label' => 'Min Weight',
                    'data' => $newData->pluck('min_weight')->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                ],
                [
                    'label' => 'Max Weight',
                    'data' => $newData->pluck('max_weight')->toArray(),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                ],
                [
                    'label' => 'Avg Weight',
                    'data' => $newData->pluck('avg_weight')->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                ],
            ],
            'labels' => $range
                ->map(fn ($d) => $d->format($isDaily ? 'M j' : 'M'))
                ->toArray(),
        ];
    }
}
