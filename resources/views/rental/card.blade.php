<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('rental.show', ['slug'=> $rental->getSlug(), 'rental' => $rental])}}">{{$rental->title}}</a>
        </h5>
        <p class="card-text">{{$rental->surface}}m2 - {{$rental->city}} ({{$rental->postal_code}})</p>
        <div class="text-primary fw-bold" style="font-size: 1.4em;">
            {{number_format($rental->price, thousands_separator:' ')}}€
        </div>
        @if ($rental->image)
        <div class="image-container">

            <img src="/storage/{{ $rental->image }}" alt="" class="img-thumbnail img-fluid"width="300" height="200">

        </div>
            
        @endif
        

    </div>
    <style>
    .image-container {
        height: 200px; /* Hauteur fixe pour le conteneur de l'image */
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Utilisez 'cover' ou 'contain' selon le comportement souhaité */
    }
</style>

</div>