    @extends('layouts.app')
    @section('title', "Sampah")
    <style>
        body {
            padding: 1rem;
        }
        .judul{
            font-family: 'Open Sans';
        }
        .card {
            width: 90%;
            margin: 0 auto 3px;
        }
        .card-title {
            margin-bottom: 0;
        }
        .card-text {
            font-size: 0.94rem;
            margin-bottom: 0.5rem;
        }
        .card-text:last-child {
            margin-bottom: 0;
        }
        .card-text small {
            font-size: 0.8rem;
        }
        .card-text small span {
            font-size: 0.7rem;
        }
        .btn-primary {
            font-size: 0.9rem;
        }
        .btn-outline-dark, .btn-outline-primary {
            font-size: 0.8rem;
            width: 120px;
            margin: 0.3rem;
        }
        .p {
            width: 95%;
        }
    </style>
    @section('content')
    <h2 class="judul text-center my-4 fw-semibold">Blog Project Laravel</h2>
    @foreach ($posts as $post)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $post->title }}</h4>
                <hr>
                <p class="card-text">{{ $post->content }}</p>
                <small class="card-text text-end fw-light"><span>{{ date("d M Y H:i", strtotime($post->created_at)) }}</span></small>
                <br>
                <small class="card-text text-end fw-light"><span>Deleted At {{ date("d M Y H:i", strtotime($post->deleted_at)) }}</span></small>
            </div>
        </div>
        @endforeach
        <div class="container"> 
        <a href="{{ url('posts/') }}">Kembali</a>
        </div>
        @endsection
