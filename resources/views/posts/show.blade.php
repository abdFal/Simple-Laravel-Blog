@extends('layouts.app')
@section('title', "$post->title")
@section('content')
<div class="container">
    <article class="blog-post my-4">
        <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ date("d M Y H:i", strtotime($post->created_at)) }} by <a href="https://www.github.com/abdfal" target="_blank">abdFal</a></p>
        <p>{{ $post->content }}</p>
        <a href="{{ url('posts/') }}">Go Back</a>
    </article>

</div>
@endsection
