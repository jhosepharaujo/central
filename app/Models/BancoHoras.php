<?php

namespace App\Models;

use App\Enums\TipoLancamento;
use Illuminate\Database\Eloquent\Model;

class BancoHoras extends Model
{
    protected $fillable = [
        'trainee_id',
        'description',
        'type', // C for credit, D for debit
        'minutes',
        'date',
    ];

    protected $casts = [
        'type' => TipoLancamento::class,
        'date' => 'date',
    ];

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }
}
