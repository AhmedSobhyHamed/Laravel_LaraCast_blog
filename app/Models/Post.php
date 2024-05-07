<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'auther'];

    // default rout key
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // filters
    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['KeySentince'] ?? false,
            fn ($query, $KeySentince) =>
            $query->where(
                fn ($query) =>
                $query
                    ->where('title', 'like', '%' . $KeySentince . '%')
                    ->orWhere('content', 'like', '%' . $KeySentince . '%')
            )
        )->when(
            $filters['CategorySentince'] ?? false,
            fn ($query, $CategorySentince) =>
            $query->whereHas('category', fn ($query) =>
            $query->where('slug', $CategorySentince))
        )->when(
            $filters['AuthSentince'] ?? false,
            fn ($query, $AuthSentince) =>
            $query->whereHas('auther', fn ($query) =>
            $query->where('username', $AuthSentince))
        );
        // $query->when(
        //     $filters['CategorySentince'] ?? false,
        //     fn ($query, $CategorySentince) =>
        //     $query
        //         ->whereExists(
        //             fn ($query) =>
        //             $query->from('categories')
        //                 ->whereColumn('categories.id', 'posts.category_id')
        //                 ->where('categories.slug', $CategorySentince)
        //         )
        // );
    }

    // relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function auther()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
