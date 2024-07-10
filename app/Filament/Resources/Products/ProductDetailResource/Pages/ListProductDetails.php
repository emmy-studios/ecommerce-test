<?php

namespace App\Filament\Resources\Products\ProductDetailResource\Pages;

use App\Filament\Resources\Products\ProductDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductDetails extends ListRecords
{
    protected static string $resource = ProductDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
