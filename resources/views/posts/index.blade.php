<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="{{asset('bootstrap/bootstrap-5.3/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .body {
            padding-left: 1rem;
            margin-bottom: 3px;
        }
    </style>
</head>
<body class="container-fluid">
    <h2 class="text-center my-3">Blog Project Laravel <a href="{{ url('posts/create')}}" class="btn btn-primary mb-2">+Buat Post</a></h2>
    @foreach ($posts as $post)
    @php($post = explode(",", $post))
    <div class="card my-3 mx-2" style="width: 50%;">
        <div class="card-body">
            <h5 class="card-title"><h4>{{ $post[1] }}</h4><hr></h5>
            <p class="card-text">{{ $post[2] }}</p>
            <small class="card-text text-end"><span class="display-6 fs-6 text-end">{{ date("d M Y H:i", strtotime($post[3])) }}</span></small>
        </div>
        <a href="{{ url('posts/' . $post[0]) }}" class="btn btn-outline-dark">View More</a>
    </div>
    @endforeach
    <script src="{{asset('bootstrap/bootstrap-5.3/js/bootstrap.min.js')}}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>