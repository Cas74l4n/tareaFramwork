<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disiplina extends Model
{
    use HasFactory;
    public function maestro()
    {
        return $this->hasMany(Maestro::class, 'id');
    }
}
