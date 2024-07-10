<?php

namespace App\Filament\Resources\Products\ProductDetailResource\Pages;

use App\Filament\Resources\Products\ProductDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductDetail extends EditRecord
{
    protected static string $resource = ProductDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
