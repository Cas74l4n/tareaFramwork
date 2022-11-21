<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hclase extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'hclases';

    protected $fillable = ['DiaSemana','HoraDeInicio','HoraFin'];
	
}
