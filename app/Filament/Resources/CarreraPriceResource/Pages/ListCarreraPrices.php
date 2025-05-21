<?php

namespace App\Filament\Resources\CarreraPriceResource\Pages;

use App\Filament\Resources\CarreraPriceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarreraPrices extends ListRecords
{
    protected static string $resource = CarreraPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
