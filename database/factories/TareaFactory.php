<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarea>
 */
class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'idUsu' => $this->faker->numberBetween(1, 10) ,
            'idEti' => $this->faker->numberBetween(1, 6),
            'tarea' => $this->faker->words(3, true) ,
            'completa' => $this->faker->boolean() ,
            'fecha' => $this->faker->dateTimeBetween('2024-02-01', '2024-6-31')->format('Y-m-d'),
        ];
    }
}
