<?php

namespace App\Filament\Resources;

use App\Filament\Resources\N8nMessageResource\Pages;
use App\Filament\Resources\N8nMessageResource\RelationManagers;
use App\Models\N8nMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class N8nMessageResource extends Resource
{
    protected static ?string $model = N8nMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'N8N Messages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('session_id')
                    ->required()
                    ->numeric(),
                TextInput::make('message')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('message.type')
                    ->label('Tipo')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'human' => 'info',
                        'ai' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('create_at')
                    ->label('Fecha y Hora')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('message.content')
                    ->label('Contenido')
                    ->html()
                    ->wrap()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => nl2br(htmlspecialchars($state)))
                    ->limit(200)
                    ->grow(),
                TextColumn::make('session_id')
                    ->label('Sesión')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('message.tool_calls')
                    ->label('Llamadas a Herramientas')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn ($state) => $state ? json_encode($state, JSON_PRETTY_PRINT) : ''),
                TextColumn::make('message.additional_kwargs')
                    ->label('Args Adicionales')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn ($state) => $state ? json_encode($state, JSON_PRETTY_PRINT) : ''),
                TextColumn::make('message.response_metadata')
                    ->label('Metadata de Respuesta')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn ($state) => $state ? json_encode($state, JSON_PRETTY_PRINT) : '')
            ])
            ->defaultSort('create_at', 'desc')
            ->groups([
                Tables\Grouping\Group::make('session_id')
                    ->label('Sesión')
                    ->collapsible(true, true), // El segundo parámetro indica que está colapsado por defecto

            ])
            ->defaultGroup('session_id')
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
               
            ])
            ->poll('5s');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListN8nMessages::route('/'),
            'edit' => Pages\EditN8nMessage::route('/{record}/edit'),
        ];
    }
}
