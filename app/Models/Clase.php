<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'clases';

    protected $fillable = ['HoraSemana','id_maestro','id_alumno','id_hclase','id_asistencia'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumno()
    {
        return $this->hasOne('App\Models\Alumno', 'id', 'id_alumno');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hclase()
    {
        return $this->hasOne('App\Models\Hclase', 'id', 'id_hclase');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function maestro()
    {
        return $this->hasOne('App\Models\Maestro', 'id', 'id_maestro');
    }
    
}
