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
@section ('title', 'Sign Up')
@section ('content')

<div class="card">
		<h4 class="text-center mb-4">Sign Up</h4>
		<form method="POST" action="{{url('register')}}">
			@csrf
			@if (session()->has('error_msg'))
				<div class="alert alert-danger display-6 fs-5 fw-light">{{session()->get('error_msg')}}</div>
			@elseif (session()->has('log_msg'))
				<div class="alert alert-warning display-6 fs-5 fw-light"><svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>{{session()->get('log_msg')}}</div>

			@endif
			<div class="mb-3">
				<label for="name" class="form-label fw-light">Email Address</label>
				<input type="text" name="name" class="form-control" id="name" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
			</div>
			<div class="mb-3">
				<label for="password" class="form-label fw-light">Password</label>
				<input type="password" name="password" class="form-control" id="password" required>
			</div>
			<div class="mb-3">
				<label for="confirm_password" class="form-label fw-light">Confirm Password</label>
				<input type="confirm_password" name="confirm_password" class="form-control" id="confirm_password" required>
			</div>
			<div class="button d-flex justify-content-center">
				<button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
			</div>
			
		</form>
	</div>


@endsection