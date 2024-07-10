<?php

namespace App\Filament\Resources\Wishlists\WishlistResource\Pages;

use App\Filament\Resources\Wishlists\WishlistResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWishlists extends ListRecords
{
    protected static string $resource = WishlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
