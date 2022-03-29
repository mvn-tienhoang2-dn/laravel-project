<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
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
            'content' => $this->faker->text(200),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
