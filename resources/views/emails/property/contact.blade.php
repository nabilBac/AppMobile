<x-mail::message>

# Nouvelle demande de Contact

Une nouvelle demande de contact a été faite pour le bien <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>.

- Prénom : {{ $data['firstname'] }}
- Nom : {{ $data['lastname'] }}
- Téléphone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

**Message**<br/>
{!! nl2br(e($data['message'])) !!}

</x-mail::message>

