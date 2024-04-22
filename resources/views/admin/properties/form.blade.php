@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Créer un bien pour la vente")

@section('content')

<h1>@yield('title')</h1>

<form class="vstack gap-2" action="{{ route ($property->exists ? 'admin.property.update' : 'admin.property.store',  $property)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method($property->exists ? 'put' : 'post')
    <div class="row">
         @include('shared.input', ['class'=>'col','label'=>'titre', 'name'=>'title', 'value'=>$property->title])
         <div class="col row">
         @include('shared.input', ['class'=>'col', 'name'=>'surface', 'value'=>$property->surface])
         @include('shared.input', ['class'=>'col','label'=>'prix', 'name'=>'price', 'value'=>$property->price])
         </div>
    </div>
    @include('shared.input', ['type'=> 'textarea', 'name'=>'description', 'value'=>$property->description])
    <div class="row">
        @include('shared.input', ['class'=>'col','label'=>'Pièces', 'name'=>'rooms', 'value'=>$property->rooms])
        @include('shared.input', ['class'=>'col','label'=>'Chambres', 'name'=>'bedrooms', 'value'=>$property->bedrooms])
        @include('shared.input', ['class'=>'col','label'=>'Etages', 'name'=>'floor', 'value'=>$property->floor])
    </div>
    <div class="row">
        @include('shared.input', ['class'=>'col','label'=>'Addresse', 'name'=>'address', 'value'=>$property->address])
        @include('shared.input', ['class'=>'col','label'=>'Ville', 'name'=>'city', 'value'=>$property->city])
        @include('shared.input', ['class'=>'col','label'=>'Code postal', 'name'=>'postal_code', 'value'=>$property->postal_code])
    </div>
        @include('shared.select', ['label'=>'Options', 'name'=>'options', 'value'=>$property->options()->pluck('id'), 'multiple'=> true])
        @include('shared.checkbox', ['name'=>'sold', 'label'=>'Vendu', 'value'=>$property->sold, 'options'=> $options])
    
     <div>

         <div class="form-goup">

            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @error("image")
            {{ $message }}
            @enderror

        </div>

                @if($property->image)
                     <img src="/storage/{{$property->image}}" alt="">
                @endif



                <button class="btn btn-primary">
                @if($property->exists)
                    Modifier
                @else
                    Créer
                @endif
                </button>
    </div>
</form>
@endsection