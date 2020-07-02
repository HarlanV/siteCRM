<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de crm para EJs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
</head>
<body>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2  d-flex justify-content-between">



        <a class="btn btn-dark mb-2" href="/"><i class="fas fa-home"></i></a>
        @auth
        <h1 class='welcome'> OlÁ {{Auth::user()->name}}, tenha um bom trabalho! </h1>

        <a class="btn btn-outline-danger" href="/logout">Sair</a>    
        @endauth

        
        @guest
        <a class="btn btn-outline-primary" href="/login">Entrar</a>    
        @endguest
        
    </nav>
    
    <div class="container">
        <div class="jumbotron">
            <!-- secção cabecalho -->
            <h1>@yield('cabecalho')</h1>
            <p class="lead">@yield('cabecalho-descrit')</p>

        </div>
        
        <!-- Secação conteudo -->
        @yield('conteudo')
    </div>
</body>
</html>