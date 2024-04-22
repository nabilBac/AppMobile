<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Rental;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $properties = Property::orderBy('created_at', 'desc')->limit(4)->get();
        $rentals = Rental::orderBy('created_at', 'desc')->limit(4)->get();
   
      
        return view('home', ['properties' => $properties, 'rentals'=>$rentals]);

        
    }
}
