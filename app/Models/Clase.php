<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'clases';

    protected $fillable = ['HoraSemana','id_Maestro','id_Alumno','id_HorarioClase','id_Asistencia'];
	
}
