<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        // 'user_id',
    ];

    //Each one Post belongs to One User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // 28-12-2020
    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function ownedBy(User $user)
    {
        return $this->user_id === $user->id;
    }
    // end 28-12-2020
}
