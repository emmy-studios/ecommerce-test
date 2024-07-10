<?php

namespace App\Filament\Resources\Categories\SubcategoryResource\Pages;

use App\Filament\Resources\Categories\SubcategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubcategory extends CreateRecord
{
    protected static string $resource = SubcategoryResource::class;
}
