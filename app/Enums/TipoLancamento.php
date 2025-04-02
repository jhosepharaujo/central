<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum TipoLancamento: string implements HasLabel, HasColor
{
    case Credito = 'C';
    case Debito = 'D';
    
    
    public function getLabel(): ?string
    {
            return match ($this) {
            self::Credito => 'Crédito',
            self::Debito => 'Débito',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Credito => 'success',
            self::Debito => 'danger',
        };
    }
}
