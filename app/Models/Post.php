<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'auther'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['KeySentince'] ?? false,
            fn ($query, $KeySentince) =>
            $query
                ->where('title', 'like', '%' . $KeySentince . '%')
                ->orWhere('content', 'like', '%' . $KeySentince . '%')
        );
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function auther()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
