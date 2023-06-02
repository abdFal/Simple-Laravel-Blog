<!DOCTYPE html>
<html>
<head>
	<title>Blogku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<style>
		::-webkit-scrollbar{
			display: none
		}
		.hero-image {
			background-image: url('{{asset('img/domenico-loia-hGV2TfOh0ns-unsplash.jpg')}}');
			background-color: black;
			box-shadow: inset 0 0 0 1000px rgba(0,0,0,.45);
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			height: 400px;
			position: relative;
		}

		.hero-text {
			text-align: center;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			color: white;
		}
	</style>
</head>
<body>
	@extends('layouts.app')
	@include('layouts.app.header')

	<div class="hero-image">
		<div class="hero-text">
			<h1>Welcome to Blogku</h1>
			<p>Your go-to destination for informative and engaging blog posts</p>
			<a href="{{url('posts')}}" class="btn btn-md btn-outline-light rounded-pill">Continue</a>
		</div>
	</div>

<div class="row mt-3 mx-4 mb-5">
	@foreach ($posts as $post)
		<div class="col-md-12">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative align-items-center">
        <div class="col-8 p-4 d-flex flex-column position-static">
          <strong class="d-inline-block text-primary-emphasis">{{$post->author}}</strong>
          <h3 class="mb-0">{{$post->title}}</h3>
          <div class="mb-1 text-body-secondary">{{ date("d M Y", strtotime($post->created_at)) }}</div>
          <p class="card-text mb-auto">{!!Illuminate\Support\Str::limit($post->content, 200)!!}</p>
          <a href="{{ url('posts/' . $post->slug) }}" class="icon-link gap-1 icon-link-hover stretched-link">
            Read more a this
          </a>
        </div>
        <div class="image-blog col-3 d-none d-lg-block">
          <img class="img-fluid" src="{{ url('storage/images/' . $post->image) }}" alt="">
        </div>
      </div>
    </div>
	@endforeach
    
  </div>

	{{-- @include('layouts.app.footer') --}}

</body>
</html>
