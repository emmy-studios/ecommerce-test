<?php

namespace App\Filament\Widgets;

use App\Models\Discounts\Discount;
use App\Models\Orders\Order;
use App\Models\Products\Product;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Products', Product::count())
                ->description('Products Quantity')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-m-shopping-bag', IconPosition::Before),
            Stat::make('Orders', Order::count())
                ->description('Orders Quantity')
                ->descriptionIcon('heroicon-m-clipboard-document-list', IconPosition::Before)
                ->chart([7, 2, 10, 3, 8, 10, 40])
                ->color('warning'),
            Stat::make('Users', User::count())
                ->description('Our Users')
                ->descriptionIcon('heroicon-m-users')
                ->chart([1, 15, 10, 10, 2, 30, 9])
                ->color('danger'),
            Stat::make('Discounts', Discount::count())
                ->description('Products Discounts')
                ->color('success')
                ->chart([10,20, 3, 89, 34, 2])
                ->descriptionIcon('heroicon-o-gift', IconPosition::Before),
        ];
    }
}
