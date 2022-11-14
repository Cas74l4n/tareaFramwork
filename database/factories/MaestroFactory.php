<?php

namespace Database\Factories;

use App\Models\Maestro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MaestroFactory extends Factory
{
    protected $model = Maestro::class;

    public function definition()
    {
        return [
			'Nombre' => $this->faker->name,
			'Celular' => $this->faker->name,
			'id_Disiplina' => $this->faker->name,
			'id_HorarioTrabajo' => $this->faker->name,
        ];
    }
}
