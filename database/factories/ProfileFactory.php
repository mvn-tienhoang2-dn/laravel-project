<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'tel'   => $this->faker->e164PhoneNumber(),
            'user_id' => $this->faker->unique()->numberBetween(0, 11),
            'province' => $this->faker->city(),
        ];
    }
}
