<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index() {
        $posts = Post::orderBy('id', 'desc')->get();

        return view("post.index", compact('posts'));
    }

    public function show(Post $post) {

        return view("post.show", compact('post'));
    }

    public function create() {

        return view("post.create");
    }

    public function store(Post $post){

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/post');
    }


}
