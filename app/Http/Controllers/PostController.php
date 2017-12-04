<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index() {
        $posts = Post::all();
        return view("post.index", compact('posts'));
    }

    public function show(Post $post) {
        dd($post);
    }

    public function create() {
        return view("post.create");
    }

    public function store(Post $post){

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/');
    }


}