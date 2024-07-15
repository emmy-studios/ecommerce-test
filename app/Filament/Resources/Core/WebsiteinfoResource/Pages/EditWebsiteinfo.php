<?php

namespace App\Filament\Resources\Core\WebsiteinfoResource\Pages;

use App\Filament\Resources\Core\WebsiteinfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteinfo extends EditRecord
{
    protected static string $resource = WebsiteinfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
