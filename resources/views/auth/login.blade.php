@extends ('layouts.app')
<style>
		body {
			background-color: #f5f5f5;
		}

		.card {
			margin-top: 100px;
			max-width: 400px;
			margin-left: auto;
			margin-right: auto;
			padding: 30px;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
			border-radius: 5px;
		}

		.form-control:focus {
			box-shadow: none;
			border-color: #4f92ff;
		}

		.btn-primary {
			background-color: #4f92ff;
			border-color: #4f92ff;
		}

		.btn-primary:hover {
			background-color: #2e71d1;
			border-color: #2e71d1;
		}
	</style>
@section ('title', 'login')
@section ('content')

<div class="card">
		<h4 class="text-center mb-4">Login</h4>
		<form method="POST" action="{{url('login')}}">
			@csrf
			@if (session()->has('error_msg'))
				<div class="alert alert-danger display-6 fs-5 fw-light">{{session()->get('error_msg')}}</div>
			@elseif (session()->has('log_msg'))
				<div class="alert alert-danger display-6 fs-5 fw-light">{{session()->get('log_msg')}}</div>

			@endif
			<div class="mb-3">
				<label for="email" class="form-label fw-light">Username</label>
				<input type="email" name="email" class="form-control" id="email" required>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label fw-light">Password</label>
				<input type="password" name="password" class="form-control" id="password" required>
			</div>
			<div class="button d-flex justify-content-center">
				<button type="submit" name="submit" class="btn btn-primary btn-block">Masuk</button>
			</div>
			
		</form>
	</div>


@endsection