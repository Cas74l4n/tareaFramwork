<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'alumnos';
    protected $fillable = [
        'Nombre',
        'Celular',
    ];


/*     public function asistencia()
    {
        return $this->hasMany(Asistencia::class, 'id');
    }
    public function clase()
    {
        return $this->hasMany(Clase::class, 'id');
    } */
}
