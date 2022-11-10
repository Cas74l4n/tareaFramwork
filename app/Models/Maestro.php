<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;
    public function disiplina()
    {
        return $this->belongsTo(Disiplina::class, 'id_Disiplina');
    }
    public function horario_trabajo()
    {
        return $this->belongsTo(HorarioTrabajo::class, 'id_HorarioTrabajo');
    }
}
