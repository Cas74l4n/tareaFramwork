<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioTrabajo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'horarioTrabajos';

    protected $fillable = ['DiaSemana','HoraDeInicio','HoraFin'];
	
}
