<?php

namespace Coleus\Health\Charts;

use Carbon\CarbonPeriod;
use Coleus\Health\Models\Weight;
use Coleus\Widgets\ChartWidget;

class WeightChart extends ChartWidget
{
    public static function getDefault()
    {
        return [
            'max_weight' => 0,
            'min_weight' => 0,
            'avg_weight' => 0,
        ];
    }

    public static function getRange()
    {
        return collect(
            CarbonPeriod::start(now()->subMonths(11))
                ->month()
                ->end(now())
        );
    }

    public static function getData(): array
    {
        $query = Weight::selectRaw("
                    DATE_FORMAT(date, '%c') as month,
                    ROUND(MAX(weight), 2) as max_weight,
                    ROUND(MIN(weight), 2) as min_weight,
                    ROUND(AVG(weight), 2) as avg_weight
                ")
            ->whereBetween('date', [now()->subMonths(11), now()])
            ->groupBy('month')
            ->orderBy('created_at')
            ->get()
            ->mapWithKeys(fn($item) => [$item->month => $item->except(['month'])]);

        $lastMonth = static::getDefault();
        $newData = static::getRange()
            ->mapWithKeys(function ($date) use (&$lastMonth, $query) {
                $currentMonth = $query[$date->month] ?? static::getDefault();
                $mappedMonth = [
                    'max_weight' => max($currentMonth['max_weight'], $lastMonth['max_weight']),
                    'min_weight' => max($currentMonth['min_weight'], $lastMonth['min_weight']),
                    'avg_weight' => max($currentMonth['avg_weight'], $lastMonth['avg_weight']),
                ];
                $lastMonth = $currentMonth;
                return [
                    $date->month => $mappedMonth,
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
            'labels' => static::getRange()
                ->map(fn($d) => $d->format('M'))
                ->toArray(),
        ];
    }
}
