<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    public function maestro()
    {
        return $this->belongsTo(Maestro::class, 'id_Maestro');
    }
    public function alumnos()
    {
        return $this->belongsTo(Alumno::class, 'id_Alumno');
    }
    public function horario_clase()
    {
        return $this->belongsTo(HorarioClase::class, 'id_HoarioClase');
    }
    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class, 'id_Asistencia');
    }
}
