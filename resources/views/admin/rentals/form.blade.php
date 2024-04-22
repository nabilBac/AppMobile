@extends('admin.admin')

@section('title', $rental->exists ? "Editer un bien locatif" : "Créer un bien pour la location")

@section('content')

<h1>@yield('title')</h1>

<form class="vstack gap-2" action="{{ route ($rental->exists ? 'admin.rental.update' : 'admin.rental.store',  $rental)}}" method="post"enctype="multipart/form-data">
    @csrf
    @method($rental->exists ? 'put' : 'post')
    <div class="row">
         @include('shared.input', ['class'=>'col','label'=>'titre', 'name'=>'title', 'value'=>$rental->title])
         <div class="col row">
         @include('shared.input', ['class'=>'col', 'name'=>'surface', 'value'=>$rental->surface])
         @include('shared.input', ['class'=>'col','label'=>'prix', 'name'=>'price', 'value'=>$rental->price])
         </div>
    </div>
    @include('shared.input', ['type'=> 'textarea', 'name'=>'description', 'value'=>$rental->description])
    <div class="row">
        @include('shared.input', ['class'=>'col','label'=>'Pièces', 'name'=>'rooms', 'value'=>$rental->rooms])
        @include('shared.input', ['class'=>'col','label'=>'Chambres', 'name'=>'bedrooms', 'value'=>$rental->bedrooms])
        @include('shared.input', ['class'=>'col','label'=>'Etages', 'name'=>'floor', 'value'=>$rental->floor])
    </div>
    <div class="row">
        @include('shared.input', ['class'=>'col','label'=>'Adresse', 'name'=>'address', 'value'=>$rental->address])
        @include('shared.input', ['class'=>'col','label'=>'Ville', 'name'=>'city', 'value'=>$rental->city])
        @include('shared.input', ['class'=>'col','label'=>'Code postal', 'name'=>'postal_code', 'value'=>$rental->postal_code])
    </div>
        @include('shared.selecte', ['label'=>'Spécificités', 'name'=>'features', 'value'=>$rental->features()->pluck('id'), 'multiple'=> true])
        @include('shared.checkbox', ['name'=>'rented', 'label'=>'Loué', 'value'=>$rental->rented, 'options'=>$features])

    <div>
    <div class="form-goup">

        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image">
            @error("image")
                {{ $message }}
            @enderror

    </div>
                @if($rental->image)
                     <img src="{{$rental->imageUrl()}}" alt="">
                @endif
        <button class="btn btn-primary">
        @if($rental->exists)
            Modifier
        @else
            Créer
        @endif
        </button>
    </div>
</form>
@endsection