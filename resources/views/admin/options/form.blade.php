@extends('admin.admin')

@section('title', $option->exists ? "Editer une option" : "Créer une option")

@section('content')

<h1>@yield('title')</h1>

<form class="vstack gap-2" action="{{route ($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">

    @csrf <!-- Protection contre les attaques CSRF -->

    @method($option->exists ? 'put' : 'post')  <!-- Utilisation de la méthode PUT pour la mise à jour ou POST pour la création -->
  
        @include('shared.input', ['label'=>'Nom', 'name'=>'name', 'value'=>$option->name])

<div>
    <button class="btn btn-primary">
        @if($option->exists)
            Modifier
        @else
            Créer
        @endif
    </button>
</div>
</form>
@endsection