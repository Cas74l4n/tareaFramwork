<?php

namespace Database\Factories;

use App\Models\HorarioTrabajo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HorarioTrabajoFactory extends Factory
{
    protected $model = HorarioTrabajo::class;

    public function definition()
    {
        return [
			'DiaSemana' => $this->faker->name,
			'HoraDeInicio' => $this->faker->name,
			'HoraFin' => $this->faker->name,
        ];
    }
}
