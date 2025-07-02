<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'titulo'=>$this->faker->sentence(3),
            'editorial'=>$this->faker->word(2),
            'precio'=>$this->faker->randomFloat(2,5,300),
        ];
    }
}
