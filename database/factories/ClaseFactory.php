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
			'id_Maestro' => $this->faker->name,
			'id_Alumno' => $this->faker->name,
			'id_HorarioClase' => $this->faker->name,
			'id_Asistencia' => $this->faker->name,
        ];
    }
}
