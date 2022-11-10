<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    public function clase()
    {
        return $this->belongsTo(Clase::class, 'id_clase');
    }
    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_Alumno');
    }
        
    public function maestro()
    {
        return $this->belongsTo(Maestro::class, 'id_Maestro');
    }
}
