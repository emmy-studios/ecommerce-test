<?php

namespace App\Filament\Resources\Customers\SocialmedialinkResource\Pages;

use App\Filament\Resources\Customers\SocialmedialinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialmedialink extends EditRecord
{
    protected static string $resource = SocialmedialinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
