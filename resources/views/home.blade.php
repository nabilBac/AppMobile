@extends('base')



@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Kalam agence</h1>
            <p>
               
            </p>
        </div>
    </div>
    <div class="container">
        <h2>Nos derniers biens à la vente</h2>
        <div class="row">
        @foreach($properties as $property)
            <div class="col">
                @include('property.card')
            </div>
        @endforeach
        </div>
    </div>
    <br>
    <br>

    <div class="container">
        <h2>Nos derniers biens à la location</h2>
        <div class="row">
        @foreach($rentals as $rental)
            <div class="col">
                @include('rental.card')
            </div>
        @endforeach
        </div>
    </div>



  
@endsection