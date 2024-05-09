<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->paragraph(random_int(1, 3)),
            'user_id' => array_rand(User::all()->pluck('id', 'id')->toArray()),
            'post_id' => array_rand(Post::all()->pluck('id', 'id')->toArray()),
        ];
    }
}
