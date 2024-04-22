@extends('admin.admin')

@section('title','toutes les options')<!-- Définition du titre de la page -->

@section('content')

   <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.option.create')}}" class="btn btn-primary">Ajouter une option</a><!-- Lien pour ajouter une nouvelle option -->
   </div>
    <table class="table table-striped">

    <thead>
        <tr>
            <th>Nom</th>
            
            <th class="text-right">Actions</th><!-- Entête de la colonne "Actions" alignée à droite -->
        </tr>
    </thead>
        </tr>
    </thead>
    <tbody>
        @foreach($options as $option)<!-- Boucle pour afficher chaque option -->

        <tr>
            <td>{{$option->name}}</td><!-- Affichage du nom de l'option -->
           
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">

                <a href="{{route('admin.option.edit', $option)}}" class="btn btn-primary">Editer</a>
                <form action="{{route('admin.option.destroy', $option) }}"method="post">
                        @csrf
                        @method("delete")<!-- Utilisation de la méthode DELETE pour supprimer l'option -->
                        <button class="btn btn-danger">Supprimer</button>
                </form>    
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$options->links()}}
@endsection