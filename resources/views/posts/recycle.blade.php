<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap-5.3/css/bootstrap.min.css')}}" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
</head>
<body class="container-fluid">
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
    <script src="{{asset('bootstrap/bootstrap-5.3/js/bootstrap.min.js')}}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
