
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Star Wars Encyclo</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body class="background">
        <header>
            <span class="btn-warning" id="details"> Details</span>
            <br>
        </header>
        <div class="content">
            <div style="display: block;">
                <form action="/itemsearch" method="post" class="input-group">
                @csrf
                    <input name="item" type="search" class="form-control rounded" placeholder="Search for specific {{$category}}" aria-label="Search" aria-describedby="search-addon" />
                    <input type="hidden" name="category" value="{{$category}}"> 
                    <button type="submit" value="item-val" class="btn btn-outline-warning">search</button>
                </form>
            </div>
        </div>
        <div style="text-align: center; display: block;">
            @if($results)
                <div class="box-container">
                    @foreach ($results as $key => $result )
                        @if($result && $key !== 'Created' && $key !== 'Edited')
                            <div style="text-align: center; text-transform: capitalize;" colspan="2">
                                <h2 style="color: #ffcc2c;" class="item-category">{{$key }}</h2>
                            </div>
                            <div class="box">
                                <h4 style="color: white;text-transform: capitalize;" class="item-category">{{is_array($result) ? '' : $result}}
                                    @if(is_array($result) && !empty($result))
                                        @foreach($result as $specific)
                                        <div>
                                            <a href="{{$specific ?? '#'}}">{{$specific ?? '#'}}
                                            <hr>
                                            </a>
                                        </div>
                                        @endforeach             
                                    @endif
                                </h4>
                            </div>
                            <br>
                        @endif
                    @endforeach
                </div>
            @endif
            <div style="display:inline-block; margin: 10px 0 30px 0;">
                <div>
                  <a href="/{{$category}}" class="btn btn-warning btn-lg" aria-current="page">
                <h5 class="option-text" style="text-transform: capitalize; padding: 4px 5px; color: black; ">Back to {{$category}}
                </h5>
                    </a>
                </div>
            </div>
        </div>
    </body>

