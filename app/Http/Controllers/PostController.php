<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter([
                'month' => request()->month,
                'year' => request()->year,
            ])
            ->simplePaginate(5);

        $archives = Post::selectRaw('year(created_at) as year, monthname(created_at) as month,count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return view("post.index", compact('posts','archives'));
    }

    public function show(Post $post)
    {
        return view("post.show", compact('post'));
    }

    public function create()
    {
        return view("post.create");
    }

    public function store(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect('/post');
    }
}
