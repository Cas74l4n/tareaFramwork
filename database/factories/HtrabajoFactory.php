<?php

namespace Database\Factories;

use App\Models\Htrabajo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HtrabajoFactory extends Factory
{
    protected $model = Htrabajo::class;

    public function definition()
    {
        return [
			'Id' => $this->faker->name,
			'DiaSemana' => $this->faker->name,
			'HoraDeInicio' => $this->faker->name,
			'HoraFin' => $this->faker->name,
        ];
    }
}
