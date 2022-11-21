<?php

namespace Database\Factories;

use App\Models\Clase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClaseFactory extends Factory
{
    protected $model = Clase::class;

    public function definition()
    {
        return [
			'HoraSemana' => $this->faker->name,
			'id_maestro' => $this->faker->name,
			'id_alumno' => $this->faker->name,
			'id_hclase' => $this->faker->name,
			'id_asistencia' => $this->faker->name,
        ];
    }
}
