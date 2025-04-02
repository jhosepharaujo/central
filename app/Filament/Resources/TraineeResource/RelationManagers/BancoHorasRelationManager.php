<?php

namespace App\Filament\Resources\TraineeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BancoHorasRelationManager extends RelationManager
{
    protected static string $relationship = 'bancoHoras';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('minutes')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('minutes')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                ->label('Data')
                ->sortable()
                ->dateTime('d/m/Y'),
            Tables\Columns\TextColumn::make('description')
                ->label('Descrição')
                ->html(),
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
            ]);

    }
}
