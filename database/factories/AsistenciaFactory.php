<?php

namespace Database\Factories;

use App\Models\Asistencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AsistenciaFactory extends Factory
{
    protected $model = Asistencia::class;

    public function definition()
    {
        return [
			'id_clase' => $this->faker->name,
			'id_alumno' => $this->faker->name,
			'id_maestro' => $this->faker->name,
        ];
    }
}
