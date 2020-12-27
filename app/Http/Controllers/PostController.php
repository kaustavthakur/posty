<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        // $posts = DB::table('posts')->paginate(4);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
    public function store(Request $request)
    {
        // dd('ok');
        //validation
        $this->validate($request, [
            'body' => 'required',
        ]);

        //store data Method -1
        // Post::create([
        //     'user_id'=>auth()->id(),
        //     'body'=>$request->body,
        // ]);

        //store data Method 2
        $request->user()->posts()->create([
            'body'=>$request->body,
        ]);

        //redirect
        return back();

    }
}
