<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
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
        .btn-primary,.btn-danger {
            margin: 0 4px;
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
    <script src="https://kit.fontawesome.com/b2c7ef89be.js" crossorigin="anonymous"></script>
</head>
<header class="d-flex px-4 flex-wrap align-items-center justify-content-center justify-content-md-between mb-4 border-bottom">
      <a href="/" class="d-flex fs-1 align-items-center col-md-3 mb-4 mb-md-0 text-dark text-decoration-none">
        <i class="fa-solid fa-blog"></i>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 mb-2 link-secondary">Home</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
      </div>
    </header>
<body class="container-fluid">
    @yield('content')
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
    </ul>
  </footer>
    <script src="{{asset('bootstrap/bootstrap-5.3/js/bootstrap.min.js')}}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>