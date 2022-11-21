<?php

namespace Database\Factories;

use App\Models\Hclase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HclaseFactory extends Factory
{
    protected $model = Hclase::class;

    public function definition()
    {
        return [
			'DiaSemana' => $this->faker->name,
			'HoraDeInicio' => $this->faker->name,
			'HoraFin' => $this->faker->name,
        ];
    }
}
