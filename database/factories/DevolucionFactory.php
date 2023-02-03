<?php

namespace Database\Factories;

use App\Models\Devolucion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DevolucionFactory extends Factory
{
    protected $model = Devolucion::class;

    public function definition()
    {
        return [
			'Fecha_devolucion' => $this->faker->name,
			'prestamos_id' => $this->faker->name,
			'libros_id' => $this->faker->name,
			'elementos_id' => $this->faker->name,
			'usuario_id' => $this->faker->name,
			'curso_id' => $this->faker->name,
        ];
    }
}
