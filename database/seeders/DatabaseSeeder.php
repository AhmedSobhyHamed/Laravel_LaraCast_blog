<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        // user
        User::factory(5)->create();

        // catigories
        Category::factory(1)->create(['name' => 'work', 'slug' => 'work']);
        Category::factory(1)->create(['name' => 'play', 'slug' => 'play']);
        Category::factory(1)->create(['name' => 'hoppies', 'slug' => 'hoppies']);
        Category::factory(2)->create();

        // post
        Post::factory(15)->create();

        // comments
        Comment::factory(60)->create();
    }
}
