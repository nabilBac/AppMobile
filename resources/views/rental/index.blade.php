@extends('base')

@section('title', 'Tous nos biens')

@section('content')
    <div class="bg-light p-5  mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface minimum" class="form-control" name="surface" value="{{$input['surface'] ?? ''}}">
            <input type="number" placeholder="Nombre de pièce min" class="form-control" name="rooms" value="{{$input['rooms'] ?? ''}}">
            <input type="number" placeholder="budget max" class="form-control" name="price" value="{{$input['price'] ?? ''}}">
            <input type="text" placeholder="Mot clef" class="form-control" name="title" value="{{$input['title'] ?? ''}}">
            <button class="btn btn-primary bnt-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>
    <div class="container">
        <div class="row">
          @forelse($rentals as $rental)
             <div class="col-3 mb-4">
                @include('rental.card') 
             </div>
            @empty
            <div class="col">
                aucun bien ne correspond à votre recherche
             </div>
            @endforelse
        </div>
        <div class=" my-4">
            {{ $rentals->links() }}
        </div>
    </div>
@endsection