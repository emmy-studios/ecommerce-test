<?php

namespace App\Filament\Resources\News\AuthorResource\Pages;

use App\Filament\Resources\News\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;
}
