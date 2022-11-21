<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrabajo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'htrabajos';

    protected $fillable = ['Id','DiaSemana','HoraDeInicio','HoraFin'];
	
}
