<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('bootstrap/bootstrap-5.3/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Postingan : {{ $post->title }}</title>
    <link href="{{ asset('/public/css/blog.css')}}">
</head>
<body>
    <div class="container">
        <article class="blog-post my-4">
        <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ date("d M Y H:i", strtotime($post->created_at)) }} by <a href="https://www.github.com/abdfal" target="_blank">abdFal</a></p>
        <p>{{ $post->content }}</p>
        <a href="{{ url('posts/') }}">Go Back</a>
      </article>
    </div>
    <script src="{{asset('bootstrap/bootstrap-5.3/js/bootstrap.min.js')}}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>