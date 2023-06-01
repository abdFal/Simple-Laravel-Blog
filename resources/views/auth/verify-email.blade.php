<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap-5.3/css/bootstrap.min.css')}}" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="{{asset('bootstrap/bootstrap-5.3/js/bootstrap.bundle.min.js')}}" ></script>
    <title>Email Verifycation</title>
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
		<h4 class="text-center mb-4 fw-bold">Email Verifycation</h4>
        @if (session('status'))
        <div class="alert alert-success">
            <small class="text-success">Email Verifycation sent!</small>
        </div>
        @endif
		<div class="card-body">
            <p class="text-muted">Before proceeding, please check your email for verifycation link, or click the button below</p>
            <form action="{{route('verification.send')}}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-link p-0 m-0 d-align-baseline" type="submit">{{__('click here to resend verifycation')}}</button>
            </form>
        </div>
	</div>
</body>
</html>