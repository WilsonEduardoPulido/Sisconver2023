<?php

namespace Database\Factories;

use App\Models\Elemento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ElementoFactory extends Factory
{
    protected $model = Elemento::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'cantidad' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'Estado' => $this->faker->name,
			'categoria_id' => $this->faker->name,
        ];
    }
}
