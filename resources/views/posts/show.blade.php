@extends('layouts.app')
@section('title', "$post->title")
@section('content')
<div class="container">
    <article class="blog-post my-4">
        <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ date("d M Y H:i", strtotime($post->created_at)) }} by <small class="fs-6 text-muted fw-light display-6">{{$post->author}}</small></p>
        <p>{!! $post->content !!}</p>
        <a href="{{ url('posts/') }}">Go Back</a>
    </article>

    <div class="my-4">
        <h5>Comments ({{$post->comments->count()}})</h5>
        <div class="comment pt-2">
        @if ($post->comments->count() > 0)
        @foreach ($post->comments->reverse() as $comment)
            <h6 class="nama_commentator pt-2">{{$comment->name}}</h6>
            <p class="nama_commentator">{!!$comment->content!!}</p>
        @endforeach
        @else
        <p class="text-muted">No comments yet.</p>
        @endif
        </div>
    </div>

    <div class="my-4 pb-5">
        <h6>Add a Comment</h6>
        <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="slug" value="{{ $post->slug }}">
            <div class="form-group">
                <input type="hidden" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <textarea class="form-control rounded-1" id="content" name="content" rows="2" placeholder="Type your comment...">{!! old('content') !!}</textarea>
            </div>
            <button type="submit" formnovalidate="formnovalidate" name="save" class="btn btn-md my-2 btn-outline-primary">Send</button>
        </form>
    </div>
</div>
@endsection
