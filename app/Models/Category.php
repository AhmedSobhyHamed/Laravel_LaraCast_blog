<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getRoutekeyName()
    {
        return 'slug';
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
