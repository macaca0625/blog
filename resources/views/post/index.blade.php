@extends("layout.main")

@section("content")

<style type="text/css">
    ul.pagination li {
        margin: 0px 10px
    }
</style>

<!-- Page Header -->
<header class="masthead" style="background-image: url('https://picsum.photos/1900/1267?image=885')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Lazylist playground</h1>
                    <span class="subheading">I dont know what I'm doing here.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a href="/post/create"><button type="button" class="btn btn-warning">Create</button></a>
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="/post/{{ $post->id }}">
                    <h2 class="post-title">
                        {{ $post->id }}. {{ $post->title }}
                    </h2>
                    <h3 class="post-subtitle">

                    </h3>
                </a>
                <p class="post-meta">Posted by<a href="#"> Eason Tsai </a>on {{ $post->created_at->diffForHumans() }}</p>
            </div>
            <hr>
            @endforeach

            <!-- Pager -->
            <div class="clearfix">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
