<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Star Wars Referencer</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body class="background">
        <div id="option-primary">
            <div><img style="max-width:50%;
            height:20%;" src="/css/img/stw.png"> 
            </div>
            <h2 style="padding: 15px; color: white;">Welcome to Star Wars Info</h2>
            <hr style="border-top: 3px solid #bbb">
            <h2 style="padding: 15px; color: white;">Choose Your Category of Interest</h2>
            <div class="btn-group" style="display:inline-block">
                @foreach($content ?? '' as $key => $result)
                    <a href="/{{$key}}" style="margin:3px 0;"class="btn btn-warning btn-lg" aria-current="page">
                        <h4 class="option-text" >{{$key}}
                        </h3>
                    </a>
                @endforeach
                <a href="/" class="btn btn-warning btn-lg"  aria-current="page">
                    <h5 class="option-text" style="text-transform: capitalize; padding: 7px 3px; color: black;">Clear Results</h3>
                </a>
            </div>
        </div>
        @yield('content')
        <footer class="footer">
            <hr class="solid" style=" border-top: 3px solid #bbb">
            When 900 Years Old You Reach, Look as Good You'll Not
        </footer>
    </body>