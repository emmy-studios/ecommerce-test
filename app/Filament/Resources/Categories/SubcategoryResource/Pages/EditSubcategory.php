<?php

namespace App\Filament\Resources\Categories\SubcategoryResource\Pages;

use App\Filament\Resources\Categories\SubcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubcategory extends EditRecord
{
    protected static string $resource = SubcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}