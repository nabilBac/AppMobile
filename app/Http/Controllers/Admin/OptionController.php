<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        return view('admin.options.index', [

            'options'=> Option::paginate(25)

        ]);
    }
    public function create()
    {
        $option = new Option();

        return view('admin.options.form',[
            'option'=> new Option()
        ]);
    }
    public function store(OptionFormRequest $request)
    {
        $option = Option::create($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L\'option a bien été enregistré');

    }
    public function edit(Option $option)
    {
        return view('admin.options.form', [

            'option'=> $option

        ]);
    }
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L\'option a bien été modifié');
    }
    public function destroy( Option $option)
    {   $option->delete();
        return redirect()->route('admin.option.index')->with('success', 'L\'option a bien été supprimé');
    }
}
