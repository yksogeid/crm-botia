<?php

namespace App\Filament\Resources\NumeroResource\Pages;

use App\Filament\Resources\NumeroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNumero extends EditRecord
{
    protected static string $resource = NumeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
