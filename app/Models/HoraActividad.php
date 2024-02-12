<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoraActividad extends Model
{
    protected $table = 'horaactividad';
    protected $fillable = ['fecha', 'horas'];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
