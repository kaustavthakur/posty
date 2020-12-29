<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Eloquent Relationship : One User has Many Posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // 28-12-2020
    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }
    // 28-12-2020

    public function receivedLikes()
    {
        return $this->hasManyThrough(PostLike::class, Post::class);
    }
}
