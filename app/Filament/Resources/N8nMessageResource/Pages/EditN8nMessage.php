<?php

namespace App\Filament\Resources\N8nMessageResource\Pages;

use App\Filament\Resources\N8nMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditN8nMessage extends EditRecord
{
    protected static string $resource = N8nMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
