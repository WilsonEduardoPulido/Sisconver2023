<?php

namespace Database\Factories;

use App\Models\Sancion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SancionFactory extends Factory
{
    protected $model = Sancion::class;

    public function definition()
    {
        return [
			'Descripcion' => $this->faker->name,
			'Estado' => $this->faker->name,
			'usuario_id' => $this->faker->name,
        ];
    }
}
