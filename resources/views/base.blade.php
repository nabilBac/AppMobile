<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>@yield('content') |Kalam agence</title>   
    <style>
        @layer reset{
            button{
                all: unset;
            }
        }
    </style>
</head>
<body>
<div class="container my-5">
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
             <a class="navbar-brand" href="/">Agence</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            @php
            $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                    <li class="nav-item ">
                         <a href="{{ route('property.index') }}" @class(['nav-link', 'active' => str_contains($route,'property.')])>biens  à la vente</a>
                    </li>
                    <li class="nav-item ">
                         <a href="{{ route ('rental.index')}}" @class(['nav-link', 'active' => str_contains($route,'rental.')])>biens  à la location</a>
                    </li>
                 </ul> 
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">s inscrire</a>
                </li>
            </ul>
            <div class="ms-auto">
                    @auth
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="{{ route ('logout')}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="nav-link">Se déconnecter</button>
                            </form>
                        </li>
                    </ul>
                    @endauth
            </div>  
        </div>
    </nav>
 @yield('content')
</div>  
</body>
</html>