<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ReportChart extends ChartWidget
{
    protected static ?string $heading = 'Sales Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'order purchased',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'color' => ['success'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
