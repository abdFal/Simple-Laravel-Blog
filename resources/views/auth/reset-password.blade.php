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
			margin: 10% auto;
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
		<form method="POST" action="{{route('password.update')}}">
			@csrf

            <input type="hidden" name="token" value="{{request()->route('token')}}">

			<div class="mb-2">
                <label for="email" class="form-label fw-light">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{old('email', $request->email)}}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-2">
                <label for="password" class="form-label fw-light">New Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="mb-2">
                <label for="password_confirmation" class="form-label fw-light">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                @if($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

			<div class="button d-flex justify-content-center">
				<button type="submit" name="submit" class="btn btn-primary btn-block">Reset Password</button>
            </div>
		</form>
	</div>
</body>
</html>