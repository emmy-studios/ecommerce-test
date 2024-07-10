<?php

namespace App\Filament\Resources\Categories\SubcategoryResource\Pages;

use App\Filament\Resources\Categories\SubcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubcategories extends ListRecords
{
    protected static string $resource = SubcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
