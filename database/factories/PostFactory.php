<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\posts>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(random_int(1, 4));
        $content = fake()->paragraph(random_int(1, 8));
        return [
            'title' => $title,
            'slug' => str_replace(' ', '-', $title),
            'excert' => substr($content, 0, 40),
            'content' => $content,
            'user_id' => array_rand(User::all()->pluck('id', 'id')->toArray()),
            'Category_id' => array_rand(Category::all()->pluck('id', 'id')->toArray()),
        ];
    }
}
