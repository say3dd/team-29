<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;

class UserTrend extends ChartWidget
{
    use InteractsWithPageFilters;
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {

        $data = Trend::model(User::class)
            ->between(
                start: now()->subMonth(),
                end:  now(),
            )
            ->perMonth()
            ->count();



        return [

                'datasets' => [
                    [
                        'label' => 'New Users',
                        'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    ],
                ],
                'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
