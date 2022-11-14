<?php

namespace Database\Factories;

use App\Models\Asistencium;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AsistenciumFactory extends Factory
{
    protected $model = Asistencium::class;

    public function definition()
    {
        return [
			'id_Clase' => $this->faker->name,
			'id_Alumno' => $this->faker->name,
			'id_Maestro' => $this->faker->name,
        ];
    }
}
