@extends('admin.admin')

@section('title', $feature->exists ? "Editer une option" : "Créer une option")

@section('content')

<h1>@yield('title')</h1>

<form class="vstack gap-2" action="{{route ($feature->exists ? 'admin.feature.update' : 'admin.feature.store', $feature) }}" method="post">

    @csrf <!-- Protection contre les attaques CSRF -->

    @method($feature->exists ? 'put' : 'post')  <!-- Utilisation de la méthode PUT pour la mise à jour ou POST pour la création -->
  
        @include('shared.input', ['label'=>'Nom', 'name'=>'name', 'value'=>$feature->name])

<div>
    <button class="btn btn-primary">
        @if($feature->exists)
            Modifier
        @else
            Créer
        @endif
    </button>
</div>
</form>
@endsection