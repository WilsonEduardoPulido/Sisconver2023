<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LibroFactory extends Factory
{
    protected $model = Libro::class;

    public function definition()
    {
        return [
			'Nombre' => $this->faker->name,
			'Autor' => $this->faker->name,
			'Editorial' => $this->faker->name,
			'Edicion' => $this->faker->name,
			'Descripcion' => $this->faker->name,
			'Estado' => $this->faker->name,
			'categoria_id' => $this->faker->name,
        ];
    }
}
