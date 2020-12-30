<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostLike extends Model
{
    use HasFactory, SoftDeletes; //30-12
    protected $fillable = [
        'user_id',
    ];
}
