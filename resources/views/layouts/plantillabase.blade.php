<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Master's League</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">    
    
    @yield('css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      body {
        background-image: url('fondo-cesped.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
    </style>
  </head>

  <body>

    <h1 class="bg-success text-white text-center">Master's League!</h1>
    <p></p>
    <p></p>
    <div class="mx-auto" style="width: 800px;">
        <a href="/clubs" class="btn btn-success">Manager esportiu (clubs-equips-jugadors)</a>
        <a href="/games" class="btn btn-warning">Organitzador Competicio (partits-accions)</a>
    </div>      
    <p></p>
    <p></p>
    <div>
      @yield('inpHiddenClub')
    </div>
    <div class="container">
        <!-- 'yield' = 'producción' en Anglès  -->
        <!-- es com fer <div id="contenido">  -->
        @yield('contenido')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('js')
  </body>
</html>