<?php

namespace Database\Factories;

use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PrestamoFactory extends Factory
{
    protected $model = Prestamo::class;

    public function definition()
    {
        return [
			'Fecha_prestamo' => $this->faker->name,
			'libros_id' => $this->faker->name,
			'elementos_id' => $this->faker->name,
			'usuario_id' => $this->faker->name,
			'curso_id' => $this->faker->name,
        ];
    }
}
