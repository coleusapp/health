<?php

namespace App\Filament\Resources\WeightResource\Widgets;

use App\Models\Weight;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class WeightChart extends ChartWidget
{
    protected static ?string $heading = 'Weight';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }

    protected function getData(): array
    {
        $data = Weight::select(['weight', DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y') as date_day")])
            ->groupBy('date_day', 'weight')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Weight',
                    'data' => $data->pluck('weight')->toArray(),
                ],
            ],
            'labels' => $data->pluck('date_day')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
