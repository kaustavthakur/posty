<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function index(Request $request, User $user)
    {
         $posts = $user->posts()->latest()->with(['user','likes'])->paginate(20);
         return view('user.profile', [
            'posts' => $posts,
            'user' => $user
         ]);
    }
}
