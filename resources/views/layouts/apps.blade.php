<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | @yield('title')</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{asset('img/logo.svg')}}"> --}}
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap-5.3/css/bootstrap.min.css')}}" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="{{asset('bootstrap/bootstrap-5.3/js/bootstrap.bundle.min.js')}}" ></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
        body {
            background-color: rgb(240, 243, 247);
        }
        .judul{
            font-family: 'Open Sans';
        }.nama span{
            font-family: 'Poppins';
            font-weight: 600;
        }
        .card {
            width: 95%;
            margin: 0 auto 3px;
        }
        .card-title {
            margin-bottom: 0;
        }
        .card-text {
            font-size: 0.94rem;
            margin-bottom: 0.2rem;
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
        .btn-outline-dark, .btn-outline-primary, .btn-outline-danger, .btn-primary {
            font-size: 0.8rem;
            width: 120px;
            margin: 0.3rem;
        }
        .btn-primary,.btn-danger, .btn-plus {
            margin: 0 4px;
            font-size: 0.9rem;
        }
        .p {
            width: 95%;
        }
        .sign-opt{
            font-size: 14px;          
        }
        .comment{
            border-top: 1px solid gray;
        }
        textarea{
            resize: none;
        }
        .nama_commentator{
            line-height: 0px
        }
        .comment-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        }
        .image-blog {
        width: 300px;
        height: 200px;
        overflow: hidden; 
        background-size: cover; 
        background-position: center center; 
        }

    </style>
    <script src="https://kit.fontawesome.com/b2c7ef89be.js" crossorigin="anonymous"></script>
</head>
    {{-- @include('layouts.app.header') --}}
    <body class="container-fluid">
        @yield('content')
    {{-- @include('layouts.app.footer') --}}

    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
            // Searchbar code
            function search_blog() {
                let input = document.getElementById('search').value
                input=input.toLowerCase();
                let x = document.getElementsByClassName('posts');
                let y = document.getElementsByClassName('paginate');
                
                for (i = 0; i < x.length; i++) { 
                    if (!x[i].innerHTML.toLowerCase().includes(input)) {
                        x[i].style.display="none";
                        // y.style.display="none";
                    }
                    else {
                        x[i].style.display="block";

                    }
                }
            }
    </script>
    
</body>
</html>