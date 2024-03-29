@extends('layouts.app')
@section('title', "Beranda")
@section('content')

<style>
    .header {
        background-image: url('{{ asset('img/hohyeong-lee-e0uCDHd19U4-unsplash.jpg') }}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-color: black;
		box-shadow: inset 0 0 0 1000px rgba(0,0,0,.55);
        height: 450px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
    }

    .header h1 {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .header p {
        font-size: 24px;
    }
</style>

<div class="header">
    <h1>Blog Ku</h1>
    <p>Find Out of The Worldwide!</p>
    <div class="text-light">
        <h6 class="border border-light bg-dark bg-opacity-75 px-2 py-3 rounded-2 ">{{ $active_post_count }} posts active
            <i class="fa-solid fa-check-to-slot text-primary"></i>
            {{ $trashed_post_count }} posts deleted
            <i class="fa-solid fa-trash text-danger"></i>
        </h6>
    </div>
</div>
<div class="container p-3 d-flex flex-column justify-content-center text-center align-items-center">
    <nav aria-label="breadcrumb" class="my-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><i class="fa-solid fa-home me-1"></i><a href="{{route('index')}}" class="text-decoration-none text-muted fw-semibold">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>
    
</div>

@foreach ($posts as $post)
<div class="posts card h-25">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}<small class="px-2 text-muted fs-6 fw-light display-6">{{$post->author}}</small></h5>
        <hr>
        <p class="card-text">{!!Illuminate\Support\Str::limit($post->content, 400)!!}</p>
        <small class="card-text text-end fw-light">
            <span>{{$post->comments->count()}} Comments</span>
        </small>
        <br>
        <small class="card-text text-end fw-light">
            <span>{{ date("d M Y", strtotime($post->created_at)) }}</span>
        </small>
    </div>
    <div class="button d-flex">
        <a href="{{ url('posts/' . $post->slug) }}" class="btn btn-outline-dark">View More</a>
        <a href="{{ url('posts/' . $post->slug . '/edit') }}" class="btn btn-outline-primary">Edit Post</a>
    </div>
</div>
@endforeach
<div class="p d-flex justify-content-end mb-5 pb-2">
    <a href="{{ url('posts/create')}}" class="btn btn-plus btn-lg btn-primary mt-2 mb-3">+ Buat Post</a>
    <a href="{{ url('posts/trash')}}" class="btn btn-lg btn-danger mt-2 mb-3">Sampah ({{ $trashed_post_count }})</a>
</div>

@endsection
