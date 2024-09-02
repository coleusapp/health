<?php

namespace App\Filament\Resources\WeightResource\Widgets;

use App\Models\Weight;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Widgets\ChartWidget;
use function PHPUnit\Framework\matches;

class WeightChart extends ChartWidget
{
    protected static ?string $heading = 'Weight Change';

    public ?string $filter = 'week';

    protected function getData(): array
    {
        $minData = collect([]);
        $maxData = collect([]);
        $avgData = collect([]);
        $labels = collect([]);
        Weight::orderBy('date')
            ->when($this->filter !== 'all', function ($query) {
                return $query->whereBetween(
                    'date',
                    match($this->filter) {
                        'week' => [now()->startOfWeek(), now()->endOfWeek()],
                        'month' => [now()->startOfMonth(), now()->endOfMonth()],
                        'year' => [now()->startOfYear(), now()->endOfYear()],
                    }
                );
            })
            ->get()
            ->map(fn ($weight) => ['date' => $weight->date->toDateString(), 'weight' => $weight->weight])
            ->groupBy('date')
            ->each(function ($weights, $date) use ($avgData, $maxData, $minData, $labels) {
                $labels->push($date);
                $minData->push($weights->pluck('weight')->min());
                $maxData->push($weights->pluck('weight')->max());
                $avgData->push($weights->pluck('weight')->avg());
            });

        return [
            'datasets' => [
                [
                    'label' => 'Min Weight',
                    'data' => $minData,
                    'borderColor' => '#85C1E9',
                    'backgroundColor' => '#85C1E9',
                ],
                [
                    'label' => 'Max Weight',
                    'data' => $maxData,
                    'borderColor' => '#C82333',
                    'backgroundColor' => '#C82333',
                ],
                [
                    'label' => 'Average Weight',
                    'data' => $avgData,
                    'borderColor' => '#81C784',
                    'backgroundColor' => '#81C784',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'all' => 'All',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
