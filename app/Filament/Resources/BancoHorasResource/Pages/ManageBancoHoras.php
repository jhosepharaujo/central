<?php

namespace App\Filament\Resources\BancoHorasResource\Pages;

use App\Filament\Resources\BancoHorasResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBancoHoras extends ManageRecords
{
    protected static string $resource = BancoHorasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->mutateFormDataUsing(function (array $data): array {
                $data['minutes'] = $data['minutes'] * 60;
                return $data;
            })
        ];
    }

    
}
