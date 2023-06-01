@extends('layouts.app')
@section('title', 'Blogku')
@section('content')

<div class="card w-50">
		<h2 class="card-header text-center mb-4 fw-bold bg-transparent">Welcome!</h2>
		<div class="card-body mx-auto text-center">
			<h4>Welcome To The Main Page of Blogku</h4>
			<a href="{{url('posts')}}" class="btn btn-sm btn-outline-primary rounded-1">Get Started</a>
		</div>
</div>

@endsection