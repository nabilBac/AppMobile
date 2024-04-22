<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRentalsRequest;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Requests\RentalContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalContactMail;

class RentalController extends Controller
{
    public function index(SearchRentalsRequest $request)

    {   

        $query = Rental::query()->orderBy('created_at', 'desc');
        if($price = $request->validated('price')){
            $query = $query->where('price', '<=', $price);
        }
        if($surface=$request->validated('surface')){
            $query = $query->where('surface', '>=', $surface);
        }
        if($rooms=$request->validated('rooms')){
            $query = $query->where('rooms', '>=', $rooms);
        }
        if($title=$request->validated('title')){
            $query = $query->where('title', 'like', "%{$title}%");
        }

        return view('rental.index',[
            'rentals'=>$query->paginate(16),
            'input'=> $request->validated()
        ]);

    }

    public function show(string $slug, Rental $rental)
    {  
        $expectedSlug = $rental->getSlug();
        if($slug !== $expectedSlug){
            return redirect()->route('rental.show', ['slug' => $expectedSlug, 'rental' => $rental]);

        }

        return view ('rental.show', [
            'rental'=> $rental 

        ]);
       
    }
    public function contact(Rental $rental, RentalContactRequest $request)
    {
        Mail::send(new RentalContactMail($rental, $request->validated()));
        return back()->with('success', 'Votre demande de contact a bien été envoyé');
    }

    
}
