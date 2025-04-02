<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BancoHorasResource\Pages;
use App\Filament\Resources\BancoHorasResource\RelationManagers;
use App\Models\BancoHoras;
use Filament\Forms;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BancoHorasResource extends Resource
{
    protected static ?string $model = BancoHoras::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('trainee_id')
                    ->relationship('trainee', 'name')
                    ->label('Estagiário')
                    ->required()
                    ->searchable()
                    ->preload(),
                ToggleButtons::make('type')
                    ->options([
                        'C' => 'Crédito',
                        'D' => 'Débito',
                    ])->default('C')
                    ->required()
                    ->inline()
                    ->label('Tipo de lançamento'),
                Forms\Components\TextInput::make('minutes')
                    ->required()
                    ->label('Horas')
                    ->suffix('h')
                    ->numeric(),
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->label('Data'),
                Forms\Components\RichEditor::make('description')
                    ->label('Descrição')
                    ->columnSpanFull()
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trainee.name')
                    ->label('Estagiário')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descrição')
                    ->html()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('minutes')
                    ->label('Horas')
                    ->alignCenter()
                    ->formatStateUsing(function ($record) {
                        return $record->minutes / 60;
                    })->suffix('h')
            ])
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
            'index' => Pages\ManageBancoHoras::route('/'),
        ];
    }

   
}
