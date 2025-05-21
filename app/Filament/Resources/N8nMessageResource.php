<?php

namespace App\Filament\Resources;

use App\Filament\Resources\N8nMessageResource\Pages;
use App\Models\N8nMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;  // Add this import at the top

class N8nMessageResource extends Resource
{
    protected static ?string $model = N8nMessage::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Historial de Conversaciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('answerUser')
                    ->label('Mensaje Usuario')
                    ->required(),
                TextInput::make('responseAI')
                    ->label('Respuesta AI')
                    ->required(),
                DateTimePicker::make('fechaAnswerUser')
                    ->label('Fecha Mensaje Usuario'),
                DateTimePicker::make('fechaResponseAI')
                    ->label('Fecha Respuesta AI'),
                TextInput::make('numero')
                    ->label('Número')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('numero')
                    ->label('Número')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('answerUser')
                    ->label('Mensaje Usuario')
                    ->wrap()
                    ->searchable()
                    ->limit(200)
                    ->html(),
                TextColumn::make('responseAI')
                    ->label('Respuesta AI')
                    ->wrap()
                    ->searchable()
                    ->html()
                    ->limit(200)
                    ->grow(),
                TextColumn::make('fechaAnswerUser')
                    ->label('Fecha Mensaje')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('fechaResponseAI')
                    ->label('Fecha Respuesta')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('fechaAnswerUser', 'desc')
            ->groups([
                Tables\Grouping\Group::make('numero')
                    ->label('Número')
                    ->collapsible()
            ])
            ->defaultGroup('numero')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->form([
                        TextInput::make('numero')
                            ->label('Número'),
                        Textarea::make('answerUser')
                            ->label('Mensaje Usuario')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('responseAI')
                            ->label('Respuesta AI')
                            ->rows(5)
                            ->columnSpanFull(),
                        DateTimePicker::make('fechaAnswerUser')
                            ->label('Fecha Mensaje Usuario'),
                        DateTimePicker::make('fechaResponseAI')
                            ->label('Fecha Respuesta AI'),
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->poll('5s');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListN8nMessages::route('/'),
        ];
    }
}
