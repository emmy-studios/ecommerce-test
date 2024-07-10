<?php

namespace App\Filament\Resources\Wishlists\WishlistResource\Pages;

use App\Filament\Resources\Wishlists\WishlistResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWishlist extends ViewRecord
{
    protected static string $resource = WishlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
