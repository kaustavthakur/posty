<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth')->only(['store', 'destroy']);
    // }
    public function index()
    {
        // $posts = Post::with(['user','likes'])->orderBy('id', 'desc')->paginate(20);
        $posts = Post::latest()->with(['user','likes'])->paginate(20);
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
        return redirect()->route('posts');

    }

    public function destroy(Post $post, Request $request)
    {
        // if(!$post->ownedBy($request->user())) dd('not allowed'); 
        // very important check, now done by PostPolicy & AuthServiceProvider as below
        $this->authorize('delete', $post); //if unauthorised will throw a 403 error

        $post->delete();
        return back();
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
    
}
