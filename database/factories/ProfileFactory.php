<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::pluck('id');
        return [
            'address' => $this->faker->address(),
            'tel'   => $this->faker->e164PhoneNumber(),
            'user_id' => $this->faker->randomElement($userIds),
            'province' => $this->faker->city(),
        ];
    }
}
