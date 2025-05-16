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
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('session_id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('message.type')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('message.content')
                    ->label('Content')
                    ->html()
                    ->wrap()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => nl2br(htmlspecialchars($state)))
                    ->limit(200),
                TextColumn::make('message.tool_calls')
                    ->label('Tool Calls')
                    ->toggleable()
                    ->formatStateUsing(fn ($state) => $state ? json_encode($state, JSON_PRETTY_PRINT) : ''),
                TextColumn::make('message.additional_kwargs')
                    ->label('Additional Args')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn ($state) => $state ? json_encode($state, JSON_PRETTY_PRINT) : ''),
                TextColumn::make('message.response_metadata')
                    ->label('Response Metadata')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn ($state) => $state ? json_encode($state, JSON_PRETTY_PRINT) : ''),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'create' => Pages\CreateN8nMessage::route('/create'),
            'edit' => Pages\EditN8nMessage::route('/{record}/edit'),
        ];
    }
}
