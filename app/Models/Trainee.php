<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $fillable = ['name'];

    protected $appends = ['total_hours'];


    public function bancoHoras()
    {
        return $this->hasMany(BancoHoras::class);
    }

    public function getTotalHoursAttribute()
    {
        $credito = $this->bancoHoras()->where('type', 'C')->sum('minutes');
        $debito = $this->bancoHoras()->where('type', 'D')->sum('minutes');
        $total = $credito - $debito;
        return $total / 60;
        
    }

}
