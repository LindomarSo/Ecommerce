<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container">
        <a class="navbar-brand" href="/">Minha Loja</a>
        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a 
                    class="nav-link active" 
                    href="{{ route('home') }}">Home
                </a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link active" 
                    href="{{ route('categoria') }}">Categorias
                </a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link active" 
                    href="{{ route('cadastrar') }}">Cadastrar
                </a>
            </li>
            @if(!\Auth::user())
            <li class="nav-item">
                <a 
                    class="nav-link active" 
                    href="{{ route('logar') }}">Logar
                </a>
            </li>
            @else 
            <li class="nav-item">
                <a 
                    class="nav-link active" 
                    href="{{ route('sair') }}">Logout
                </a>
            </li>
            <li class="nav-item">
                <a 
                    class="nav-link active" 
                    href="{{ route('compra_historico') }}">Minhas Compras
                </a>
            </li>
            @endif
        </ul>
        </div>
        <a href="{{ route('ver_carrinho') }}" class="btn btn-sm">
            <i class="fa fa-shopping-cart"></i>
        </a>
    </div>
</nav>
        
        <div class="container">
            <div class="row">

            @if(\Auth::user())
                <div class="col-12">
                    <p class="text-end">Seja bem vindo <b>{{\Auth::user()->nome }}!</b> 
                        <a class="logout" href="{{route('sair')}}">Sair</a>
                    </p>
                </div>
            @endif
                @if($message = Session::get("err"))
                    <div class="col-md-10 offset-1">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @endif
                @if($message = Session::get("ok"))
                    <div class="col-md-10 offset-1">
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script   
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
            crossorigin="anonymous">
        </script>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" 
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" 
            crossorigin="anonymous">
        </script>
        <script src="/js/jquery.mask.js"></script>
        @yield('scriptjs')
    </body>
</html>
