<?php

namespace App\Filament\Resources\Shoppingcarts\ShoppingcartResource\Pages;

use App\Filament\Resources\Shoppingcarts\ShoppingcartResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewShoppingcart extends ViewRecord
{
    protected static string $resource = ShoppingcartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
