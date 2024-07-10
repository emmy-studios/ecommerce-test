<?php

namespace App\Filament\Resources\News\AuthorResource\Pages;

use App\Filament\Resources\News\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAuthor extends ViewRecord
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
