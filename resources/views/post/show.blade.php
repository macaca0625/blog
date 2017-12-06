@extends("layout.main")

@section("content")
<style type="text/css">
    .post-content {
        margin: 50px 0px;
    }
</style>

<!-- Page Header -->
<header class="masthead" style="background-image: url('https://picsum.photos/1900/586?image=809')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>{{ $post->title }}</h1>
                    <p class="post-meta">Eason Tsai, {{ $post->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <h2 class="post-title">
                    {{ $post->title }}
                </h2>

                <div class="post-content">
                    {{ $post->body }}
                </div>

                <p class="post-meta">Posted by<a href="#"> Eason Tsai </a>on {{ $post->created_at->toFormattedDateString() }}</p>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection
