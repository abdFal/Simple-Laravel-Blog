<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('bootstrap/bootstrap-5.3/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>create new post</title>
</head>
<body>
    <div class="container my-3">
        <h2 class="title">Buat Posting Baru</h2>
    <form method="POST" action="{{ url('posts') }}">
        @csrf
        <label for="title" class="form-label">Judul Postingan</label>
            <input type="text" class="form-control" id="title" name="title" required>     
                <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" rows="3" name="content" required></textarea>
        <button type="submit" name="save" class="btn btn-dark my-2">Save</button>
        <button type="submit" name="save" class="btn btn-dark my-2"><a class="text-decoration-none text-light" href="{{ url('posts') }}">Back</a></button>
    </form>
  </div>
    <script src="{{asset('bootstrap/bootstrap-5.3/js/bootstrap.min.js')}}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>