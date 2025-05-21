<?php

namespace App\Filament\Resources\ContextoResource\Pages;

use App\Filament\Resources\ContextoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContexto extends EditRecord
{
    protected static string $resource = ContextoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
