<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\CarreraPrice;
use App\Models\Contexto;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Usuarios', User::count())
                ->description('Usuarios registrados en el sistema')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            
            Stat::make('Total Carreras', CarreraPrice::count())
                ->description('Carreras registradas')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'),

            Stat::make('Total Contextos', Contexto::count())
                ->description('Contextos configurados')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),
        ];
    }
}