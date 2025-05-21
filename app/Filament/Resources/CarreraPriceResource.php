<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarreraPriceResource\Pages;
use App\Models\CarreraPrice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\KeyValue;

class CarreraPriceResource extends Resource
{
    protected static ?string $model = CarreraPrice::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Precios de Carreras';
    protected static ?string $modelLabel = 'Precio de Carrera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('carrera')
                    ->required()
                    ->maxLength(100)
                    ->label('Nombre de la Carrera'),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Costos')
                            ->schema([
                                Forms\Components\Group::make()
                                    ->schema([
                                        TextInput::make('precio.costos.inscripcion.valor')
                                            ->label('Valor Inscripción')
                                            ->numeric(),
                                        TextInput::make('precio.costos.inscripcion.descripcion')
                                            ->label('Descripción Inscripción'),
                                    ])->columns(2),
                                TextInput::make('precio.costos.valor_semestre')
                                    ->label('Valor Semestre')
                                    ->numeric(),
                                TextInput::make('precio.costos.estampilla_pro_cultura')
                                    ->label('Estampilla Pro-Cultura')
                                    ->numeric(),
                                Forms\Components\Group::make()
                                    ->schema([
                                        TextInput::make('precio.costos.descuento_30_por_ciento.aplica')
                                            ->label('Aplica Descuento'),
                                        TextInput::make('precio.costos.descuento_30_por_ciento.valor_con_descuento')
                                            ->label('Valor con Descuento')
                                            ->numeric(),
                                    ])->columns(2),
                            ])
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('carrera')
                    ->label('Carrera')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('precio.costos.inscripcion.valor')
                    ->label('Valor Inscripción')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('precio.costos.valor_semestre')
                    ->label('Valor Semestre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('precio.costos.estampilla_pro_cultura')
                    ->label('Estampilla Pro-Cultura')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('precio.costos.descuento_30_por_ciento.valor_con_descuento')
                    ->label('Valor con Descuento')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarreraPrices::route('/'),
            'create' => Pages\CreateCarreraPrice::route('/create'),
            'edit' => Pages\EditCarreraPrice::route('/{record}/edit'),
        ];
    }
}
