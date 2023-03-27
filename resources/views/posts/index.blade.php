    @extends('layouts.app')
    @section('title', "Beranda")
    @section('content')
    <h3 class="judul text-center my-4 fw-semibold">Blog Project Laravel</h3>
    <div class="container p d-block justify-content-center align-items-center">
        <div class="text-muted">
            <h6>{{ $active_post_count }} post aktif 
                <i class="fa-solid fa-check-to-slot text-primary"></i> 
                {{ $trashed_post_count }} post deleted 
                <i class="fa-solid fa-trash text-danger"></i>
            </h6>  
        </div>
    </div>
    
    @foreach ($posts as $post)
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <hr>
            <p class="card-text">{{ $post->content }}</p>
            <small class="card-text text-end fw-light">
                <span>{{ date("d M Y H:i", strtotime($post->created_at)) }}</span>
            </small>
        </div>
        <div class="button d-flex">
            <a href="{{ url('posts/' . $post->slug) }}" class="btn btn-outline-dark">View More</a>
            <a href="{{ url('posts/' . $post->slug . '/edit') }}" class="btn btn-outline-primary">Edit Post</a>
        </div>
    </div>
    @endforeach
        <div class="p d-flex justify-content-end mb-5 pb-2">
            <a href="{{ url('posts/create')}}" class="btn btn-lg btn-primary mt-2">+ Buat Post</a>
            <a href="{{ url('posts/trash')}}" class="btn btn-lg btn-danger mt-2">Sampah ({{ $trashed_post_count }})</a>
        </div>

    @endsection