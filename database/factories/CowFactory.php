<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CowFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'age' => rand(1,5),
        ];
    }

}
