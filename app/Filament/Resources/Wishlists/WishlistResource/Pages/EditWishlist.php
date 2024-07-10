<?php

namespace App\Filament\Resources\Wishlists\WishlistResource\Pages;

use App\Filament\Resources\Wishlists\WishlistResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWishlist extends EditRecord
{
    protected static string $resource = WishlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
