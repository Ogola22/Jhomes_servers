<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property = Property::all();
        return $property;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $property = new Property();
        $property->title = $request->title;
        $property->location = $request->location;
        $property->desc = $request->desc;
        $property->price = $request->price;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->size = $request->size;
        $property->type = $request->type;
        $property->image = $request->image;
        $property->garage = $request->garage;

        $property->save();
        return "Property Saved Successfylly";

    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $property = Property::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
