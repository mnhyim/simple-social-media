<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use Auth;
use Redirect;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('home.index',compact('posts'));
    }
    
    public function store(Request $request) 
    {
        $id = Auth::id();
        Post::create([
            'posts' => request('posts'),
            'poster_id' => $id
        ]);

        $posts = Post::latest()->paginate(5);
        return back();
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return back();
    }
}
