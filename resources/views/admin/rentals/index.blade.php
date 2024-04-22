@extends('admin.admin')

@section('title','tous les biens locatif')

@section('content')

<div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.rental.create')}}" class="btn btn-primary">Ajouter un bien</a>
   </div>
   
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rentals as $rental)
        <tr>
            <td>{{$rental->title}}</td>
            <td>{{$rental->surface}}m2</td>
            <td>{{number_format($rental->price, thousands_separator:'')}}</td>
            <td>{{$rental->city}}</td>
            <td>
            <div class="d-flex gap-2 w-100 justify-content-end">

                <a href="{{route('admin.rental.edit', $rental)}}" class="btn btn-primary">Editer</a>
                <form action="{{route('admin.rental.destroy', $rental) }}"method="post">
                    @csrf
                    @method("delete")
                <button class="btn btn-danger">Supprimer</button>
                </form>
            </div>
          
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$rentals->links()}}
@endsection