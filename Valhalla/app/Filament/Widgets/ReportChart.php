<?php

namespace App\Filament\Widgets;

use App\Models\Orders;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;

class ReportChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Sales Chart';

    protected function getData(): array
    {
       $start = $this->filters['startDate'];
        $end = $this->filters['endDate'];

        $data = Trend::model(Orders::class)
            ->between(
                start: $start ? Carbon::parse($start) : now()->subMonth(6),
                end: $end ? Carbon::parse($end) : now(),
            )
            ->perMonth()
            ->count();



        return [
            [
            'datasets' => [
                [
                    'label' => 'New users',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
                ],
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),

        ];

//
    }

    protected function getType(): string
    {
        return 'line';
    }
}
