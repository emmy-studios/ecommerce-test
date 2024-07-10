<?php

namespace App\Filament\Resources\Wishlists\WishlistResource\Pages;

use App\Filament\Resources\Wishlists\WishlistResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWishlist extends CreateRecord
{
    protected static string $resource = WishlistResource::class;
}
