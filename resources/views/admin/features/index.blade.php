@extends('admin.admin')

@section('title','toutes les options')<!-- Définition du titre de la page -->

@section('content')

   <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.feature.create')}}" class="btn btn-primary">Ajouter une spécificité</a><!-- Lien pour ajouter une nouvelle feature -->
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
        @foreach($features as $feature)<!-- Boucle pour afficher chaque feature -->

        <tr>
            <td>{{$feature->name}}</td><!-- Affichage du nom de l'feature -->
           
            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">

                <a href="{{route('admin.feature.edit', $feature)}}" class="btn btn-primary">Editer</a>
                <form action="{{route('admin.feature.destroy', $feature) }}"method="post">
                        @csrf
                        @method("delete")<!-- Utilisation de la méthode DELETE pour supprimer l'feature -->
                        <button class="btn btn-danger">Supprimer</button>
                </form>    
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$features->links()}}
@endsection