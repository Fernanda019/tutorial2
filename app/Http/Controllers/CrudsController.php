<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudsController extends Controller
{
    public function index()
    {
        return Crud::all();
    }

    public function store()
    {
        $crud = Crud::create([
            'name' => fake()->name(),
            'color' => rand(0,1) ? 'red' : 'green'
        ]);

        return response()->json($crud);
    }

    public function update(Request $request, $id)
    {
        $crud = Crud::findOrFail($id);

        $crud->update([
            'color' => $request->color
        ]);

        return response()->json($crud);
    }

    public function destroy($id)
    {
        Crud::destroy($id);

        return response()->json();
    }
}