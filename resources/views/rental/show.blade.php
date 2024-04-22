@extends('base')

@section('title', $rental->title)


@section('content')
    <div class="container mt-4">
   
        <h1>{{ $rental->title }}</h1>
        <h2>{{ $rental->rooms }} pièces - {{ $rental->surface }} m2</h2>


        <div class="text-primary fw-bold" style="font-size: 4rem ;">
            {{number_format($rental->price, thousands_separator: ' ')}} €
        </div>

        <hr>

        <div class="mt-4">
            <h4>Interessé par ce bien ?</h4>

            @include('shared.flash')

            
            <form action="{{route('rental.contact', $rental)}}" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ['class'=>'col', 'name'=>'firstname','label'=>'Prénom'])
                    @include('shared.input', ['class'=>'col','name'=>'lastname', 'label'=>'Nom'])
                </div>
                <div class="row">
                    @include('shared.input', ['class'=>'col','name'=>'phone', 'label'=>'Téléphone'])
                    @include('shared.input', ['type'=>'email', 'class'=>'col','name'=>'email', 'label'=>'Email'])
                </div>
                    @include('shared.input', ['type'=>'textarea', 'class'=>'col','name'=>'message', 'label'=>'Votre message'])
                <div>
                    <button class="btn btn-primary">Nous contacter</button>
                </div>
            </form>
        </div>
        <div class="mt-4">

            <p>{!! nl2br($rental->description) !!}</p>

            <div class="row">

                <div class="col-8">
                    <h2>Caractéristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{$rental->surface}}m2</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{$rental->rooms}}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{$rental->bedrooms}}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{$rental->floor ?: 'rez de chaussé'}}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{$rental->address}}<br/>
                                {{$rental->city}} ({{ $rental->postal_code}})

                            </td>
                        </tr>
                    </table>
                </div>

                @if($rental->image)
                     <img src="/storage/{{$rental->image}}" alt="">
                @endif
    

                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach($rental->features as $feature)
            
                        <li class="list-group-item"> {{$feature->name}}</>

                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
       
    </div>
        
@endsection