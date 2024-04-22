<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
   
    
    <title>@yield('title') |Administration</title>

   
   
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
             <a class="navbar-brand" href="/">Agence</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            @php
            $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                    <li class="nav-item ">
                         <a href="{{route('admin.rental.index')}}" @class(['nav-link', 'active' => str_contains($route,'rental.')])>Gérer les biens à la location</a>
                    </li>
                   
                    <li class="nav-item ">
                         <a href="{{route('admin.feature.index')}}" @class(['nav-link', 'active' => str_contains($route,'feature.')])>Gérer les options pour la location</a>
                    </li>
                 </ul>
                 
            </div>
        </div>
    </nav>






    <div class="container mt-5">


        @if(session('success'))

            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if($errors->any())

            <div class="alert alert-danger">
                <ul class="my-0">
                    @foreach($errors->all() as $error)

                        <li>
                            {{$error}}
                        </li>

                    @endforeach
                </ul>
            </div>

        @endif
        @include('shared.flash')
      
        @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]', {plugins:{remove_button:{title:'Supprimer'}}})
    </script>

</body>
</html>