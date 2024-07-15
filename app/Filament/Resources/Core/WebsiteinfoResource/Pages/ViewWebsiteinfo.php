<?php

namespace App\Filament\Resources\Core\WebsiteinfoResource\Pages;

use App\Filament\Resources\Core\WebsiteinfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWebsiteinfo extends ViewRecord
{
    protected static string $resource = WebsiteinfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
