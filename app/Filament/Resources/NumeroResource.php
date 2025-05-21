<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NumeroResource\Pages;
use App\Models\Numero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class NumeroResource extends Resource
{
    protected static ?string $model = Numero::class;
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $navigationLabel = 'Números de Contacto';
    protected static ?string $modelLabel = 'Número';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('area')
                    ->required()
                    ->maxLength(100)
                    ->label('Área'),
                TextInput::make('numero')
                    ->required()
                    ->maxLength(20)
                    ->label('Número')
                    ->tel()
                    ->telRegex('/^[+\d\s-]+$/'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('area')
                    ->label('Área')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('numero')
                    ->label('Número')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
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
            'index' => Pages\ListNumeros::route('/'),
            'create' => Pages\CreateNumero::route('/create'),
            'edit' => Pages\EditNumero::route('/{record}/edit'),
        ];
    }
}
