<?php

namespace Database\Factories;

use App\Models\Disiplina;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DisiplinaFactory extends Factory
{
    protected $model = Disiplina::class;

    public function definition()
    {
        return [
			'Nombre' => $this->faker->name,
        ];
    }
}
