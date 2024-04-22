<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    
    public function index()
    {   
       
        return view('admin.properties.index', [

            'properties'=> Property::orderBy('created_at','desc')->paginate(25)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();

        $property->fill([
            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0,
            'city'=> 'Toulon',
            'postal_code'=> '83000',
            'sold'=> false,

        ]);
        
        return view('admin.properties.form',[
            'property'=> $property,
            'options'=> Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {   
        
        $property = new Property();
        $property = new Property();
        $property = Property::create($this->extractData($property, $request));
        $property->user_id = auth()->user()->id; // Assigne l'ID de l'utilisateur actuellement authentifié
        $property->save();
        $property->options()->sync($request->validated('options'));

        $property = Property::create($this->extractData($property, $request));
        $property->options()->sync($request->validated('options'));
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été enregistré');

    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [

            'property'=> $property,
            'options'=> Option::pluck('name', 'id'),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    { 
        
        $property->update($this->extractData($property, $request));
        $property->options()->sync($request->validated('options'));
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été modifié');
    }

    private function extractData (Property $property, PropertyFormRequest $request): array
    {

        $data = $request->validated();
        /**@var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image===null || $image->getError()){
            return $data;
        }
        if($property->image){
            Storage::disk('public')->delete($property->image);
        }
       
         $data['image'] = $image->store('blog', 'public');
         return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Property $property)
    {   $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été supprimé');
    }
    
    public function show(Property $property)
    {
         return view('admin.properties.show', compact('property'));
    }

}
