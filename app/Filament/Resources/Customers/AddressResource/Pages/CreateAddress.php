<?php

namespace App\Filament\Resources\Customers\AddressResource\Pages;

use App\Filament\Resources\Customers\AddressResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAddress extends CreateRecord
{
    protected static string $resource = AddressResource::class;
}
