<?php

namespace App\Filament\Resources\Core\WebsiteinfoResource\Pages;

use App\Filament\Resources\Core\WebsiteinfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteinfos extends ListRecords
{
    protected static string $resource = WebsiteinfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
