<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap-5.3/css/bootstrap.min.css')}}" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="{{asset('bootstrap/bootstrap-5.3/js/bootstrap.bundle.min.js')}}" ></script>
    <title>Reset Password</title>
    <style>
		body {
			background-color: #f5f5f5;
		}

		.card {
			margin: 30vh auto;
			max-width: 400px;
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
</head>
<body>
<div class="card">
		<h4 class="text-center mb-4 fw-bold">Reset Password</h4>
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
		<form method="POST" action="{{route('password.request')}}">
			@csrf
			@if (session()->has('error_msg'))
				<div class="alert alert-danger display-6 fs-5 fw-light">{{session()->get('error_msg')}}</div>
			@elseif (session()->has('log_msg'))
				<div class="alert alert-warning display-6 fs-5 fw-light">{{session()->get('log_msg')}}</div>
			@elseif (session()->has('success_msg'))
				<div class="alert alert-success display-6 fs-5 fw-light">{{session()->get('success_msg')}}</div>

			@endif
			<div class="mb-3">
				<label for="email" class="form-label fw-light">Email</label>
				<input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" required>
				@if ($errors->has('email'))
					<small class="text-danger">{{$errors->first('email')}}</small>
				@endif
			</div>
			<div class="button d-flex justify-content-center">
				<button type="submit" name="submit" class="btn btn-primary btn-block">Send Reset Link</button>
            </div>
		</form>
	</div>
</body>
</html>