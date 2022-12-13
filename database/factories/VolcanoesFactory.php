<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Planes>
 */
class PlanesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(10),
            'slug'=>$this->faker->text(12),
            'description'=>$this->faker->text(15),
            'place'=>$this->faker->text(16),

        ];
    }
}
