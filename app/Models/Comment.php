<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['user', 'post'];

    protected $fillable = ['content', 'user_id', 'post_id'];

    // mutator
    public function setContentAttribute($content)
    {
        $this->attributes['content'] = strip_tags($content);
    }
    // relationships
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
