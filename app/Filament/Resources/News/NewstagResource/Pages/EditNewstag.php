<?php

namespace App\Filament\Resources\News\NewstagResource\Pages;

use App\Filament\Resources\News\NewstagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewstag extends EditRecord
{
    protected static string $resource = NewstagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
