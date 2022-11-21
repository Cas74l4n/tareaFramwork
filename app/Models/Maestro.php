<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'maestros';

    protected $fillable = ['Nombre','Celular','id_disiplina','id_horario_trabajo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases()
    {
        return $this->hasMany('App\Models\Clase', 'id_maestro', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function disiplina()
    {
        return $this->hasOne('App\Models\Disiplina', 'id', 'id_disiplina');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function horariotrabajo()
    {
        return $this->hasOne('App\Models\Horariotrabajo', 'id', 'id_htrabajo');
    }
    
}
