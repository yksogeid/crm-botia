<?php

namespace App\Filament\Resources\ContextoResource\Pages;

use App\Filament\Resources\ContextoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContextos extends ListRecords
{
    protected static string $resource = ContextoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Remove the default create action
        ];
    }
}
