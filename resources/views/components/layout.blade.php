<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/059f12be04.js" crossorigin="anonymous"></script>
    <title>Sistema de Estoque</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              @auth
              <span class="navbar-brand" >Usuario: {{Auth::user()->name}}</span>
              @endauth
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('estoque.index')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('cadastro.create')}}">Cadastrar</a>
                  </li>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <main class="pt-1 mt-1 bg-light" style="min-height: 470px" >
      <div class="container" >
        <div class="jumbotron" >
            <h1 class="mt-2">{{$header}}</h1>
        </div>
        {{$slot}}
        </div>
      </main>
</body>
</html>