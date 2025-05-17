<?php

namespace App\Filament\Resources\N8nMessageResource\Pages;

use App\Filament\Resources\N8nMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListN8nMessages extends ListRecords
{
    protected static string $resource = N8nMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
