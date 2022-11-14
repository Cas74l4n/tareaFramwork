<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencium extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'asistencia';

    protected $fillable = ['id_Clase','id_Alumno','id_Maestro'];
	
}
