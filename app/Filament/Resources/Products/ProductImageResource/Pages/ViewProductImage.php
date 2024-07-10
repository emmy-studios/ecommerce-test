<?php

namespace App\Filament\Resources\Products\ProductImageResource\Pages;

use App\Filament\Resources\Products\ProductImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductImage extends ViewRecord
{
    protected static string $resource = ProductImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
