<?php

namespace App\Filament\Widgets;

use App\Models\Orders;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Users', User::count())
                ->description('Newly joined users')
            ->descriptionIcon('heroicon-m-users', IconPosition::Before)
            ->chart([1, 2, 6, 9, 12, 15, 18])
            ->color('primary'),

            Stat::make('Sales', Orders::count())
            ->description('Total orders')
            ->descriptionIcon('heroicon-s-currency-pound', IconPosition::Before),
        ];
    }
}
