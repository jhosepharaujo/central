<?php

namespace App\Filament\Resources\TraineeResource\Pages;

use App\Filament\Resources\TraineeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTrainees extends ManageRecords
{
    protected static string $resource = TraineeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
