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
      static $etiquetas = null;

      if ($etiquetas === null) {
          $etiquetas = range(1, 5);
          shuffle($etiquetas);
      }

      static $index = 0;

        return [
            'idUsu' => $this->faker->numberBetween(1, 10) ,
            'idEti' => $etiquetas[$index++] ,
            'texto' => $this->faker->words(3, true) ,
            'completa' => $this->faker->boolean() ,
            'fecha' => $this->faker->date() ,
        ];
    }
}
