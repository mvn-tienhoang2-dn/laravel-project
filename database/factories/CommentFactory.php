<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::pluck('id');
        $postIds = Post::pluck('id');
        return [
            'content' => $this->faker->sentence(),
            'post_id' => $this->faker->randomElement($postIds),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
