<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RentalFormRequest;
use App\Models\Rental;
use App\Models\Feature;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{
    
    public function index()
    {
        return view('admin.rentals.index', [
            'rentals' => Rental::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rental = new Rental();

        $rental->fill([
            
            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0,
            'city'=> 'Toulon',
            'postal_code'=> '83000',
            'rented'=> false,

        ]);
        return view('admin.rentals.form', [
            'rental' => $rental,
            'features'=> Feature::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RentalFormRequest $request)
    {  
        $rental = new Rental();
    
       $rental = Rental::create($this->extractData($rental, $request));
       $rental->features()->sync($request->validated('features'));
       return to_route('admin.rental.index')->with('success', 'le bien a bien été créé');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        return view('admin.rentals.form', [
            'rental' => $rental,
            'features'=> Feature::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RentalFormRequest $request, Rental $rental)
    {   
      
        $rental->update($this->extractData($rental, $request));
        $rental->features()->sync($request->validated('features'));
        return to_route('admin.rental.index')->with('success', 'le bien a bien été modifié');
    }

    private function extractData (Rental $rental, RentalFormRequest $request): array
    {

        $data = $request->validated();
        /**@var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image===null || $image->getError()){
            return $data;
        }
        if($rental->image){
            Storage::disk('public')->delete($rental->image);
        }
       
         $data['image'] = $image->store('blog', 'public');
         return $data;
    }

    public function destroy(Rental $rental)
    {   
        $rental->delete();
        return to_route('admin.rental.index')->with('success', 'le bien a bien été supprimer');
    }

    
}
