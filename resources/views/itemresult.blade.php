<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Star Wars Search Results</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body class="background" style="color: white">
        <div class="container" style="margin-bottom: 40px;">
          <span style="font-size: 1.5rem; border: 1px solid #ffcc2c; display: flex; padding: 8px; justify-content: center; margin: 10px 0;">Search Results For {{ ucwords(Request::get('item')) }} </span>
          <div class="results-container" style="text-align: center;">
          </div>
          <a href="/{{Request::get('category')}}" class="btn btn-warning btn-lg"  aria-current="page">
           <h5 class="option-text" style="text-transform: capitalize;  padding: 4px 5px; color: black; text-align: center;">Back to {{Request::get('category')}} </h5>
           </a>
        </div>
    </body>
  </html>
  <script>
    $(document).ready(function({{ Request::get('item') }}){
      $.ajax({
          type: "GET",
          url: "https://swapi.dev/api/{{ Request::get('category')}}/?search={{ Request::get('item') }}"  ,
          dataType: "json",
          success: function (result, status, xhr) {
            const itemResults = result['results'][0]; 
            for (const key in itemResults) {
              if(key != 'created' && key != 'edited'){
                console.log(`${key}: ${itemResults[key]}`);
                if(Array.isArray(itemResults[key] )){
                  $('.results-container').append('<hr class="solid "style="border-top: 3px solid #bbb">' +'<h3 style="border: 1px solid #ffcc2c; background: slate; border-radius: 5px; max-width: 30%; color: #fff;">' +`${key.replace('_',' ').toUpperCase()}:` +'</h3>')
                  for (const values in itemResults[key]){
                    $('.results-container').append('<h3 style="border-radius: 5px;">' + '<a href="#" style="color: white">' +itemResults[key][values] + '</a>' +'</h3>' )
                  }
                } else {
                $('.results-container').append('<hr class="solid "style="border-top: 3px solid #bbb">' +'<h3 style="border: 1px solid #ffcc2c; background: slate;border-radius: 5px; max-width: 30%;">' + `${key.replace('_',' ').toUpperCase()}` +'</h3>' + '<h3 style="color: #fff">'+ `${itemResults[key]}` +'</h3>' )
                  }
                }
              }
          },
          error: function (xhr, status, error) {
              alert("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
          }
      });
    });
</script>
