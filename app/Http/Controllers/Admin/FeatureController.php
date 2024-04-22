<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureFormRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FeatureController extends Controller
{
    
    public function index()
    {
        return view('admin.features.index', [
            'features' => Feature::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $feature = new Feature();

        return view('admin.features.form', [
            'feature' => $feature
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeatureFormRequest $request)
    {
       $feature = Feature::create($request->validated());
       return to_route('admin.feature.index')->with('success', 'L\'option a bien été créé');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('admin.features.form', [
            'feature' => $feature
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeatureFormRequest $request, Feature $feature)
    {
        $feature->update($request->validated());
        return to_route('admin.feature.index')->with('success', 'L\'option a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {   
        $feature->delete();
        return to_route('admin.feature.index')->with('success', 'L\'option a bien été supprimer');
    }
}
