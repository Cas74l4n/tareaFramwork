<?php

namespace Database\Factories;

use App\Models\HorarioClase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HorarioClaseFactory extends Factory
{
    protected $model = HorarioClase::class;

    public function definition()
    {
        return [
			'DiaSemana' => $this->faker->name,
			'HoraDeInicio' => $this->faker->name,
			'HoraFin' => $this->faker->name,
        ];
    }
}
