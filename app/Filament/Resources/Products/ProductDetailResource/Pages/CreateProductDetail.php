<?php

namespace App\Filament\Resources\Products\ProductDetailResource\Pages;

use App\Filament\Resources\Products\ProductDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductDetail extends CreateRecord
{
    protected static string $resource = ProductDetailResource::class;
}
