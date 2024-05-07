<?php

namespace App\Models;

use App\Models\Post;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // relationships
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    // mutators
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function setUsernameAttribute($username)
    {
        $this->attributes['username'] = strtolower($username);
    }
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }
    // accessors
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }
}
