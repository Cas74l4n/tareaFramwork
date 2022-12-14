<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'asistencias';

    protected $fillable = ['id_clase','id_alumno','id_maestro'];
	
}
