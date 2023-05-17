<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;


class ApiPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return $properties;
    }

    public function store(Request $request)
    {
        $request->validate([]);
        $properties = new Property();
        $properties->title = $request->title;
        $properties->user_id = $request->user_id;
        $properties->location = $request->location;
        $properties->desc = $request->desc;
        $properties->price = $request->price;
        $properties->bedroom = $request->bedroom;
        $properties->bathroom = $request->bathroom;
        $properties->size = $request->size;
        $properties->garage = $request->garage;

        $properties->save();
        return "Property Saved Successfylly";

    }
    public function show($id)
    {
        $property = Property::findorFail($id);
        return $property;
    }
    public function update(Request $request, string $id)
    {
        $property = Property::find($id);
        $request->vilidate([
            'title' =>['required', 'min:10', 'max:100'],
            'location' =>['required', 'min:2', 'max:100'],
            'desc' =>['required','max:255'],
            'price' =>['required'],
            'bedroom' =>['required'],
            'bathroom' =>['required'],
            'size' =>['required'],
            'type' =>['required'],
            'garage' =>['required'],
        ]);
        $property->title = $request->title;
        $property->location = $request->location;
        $property->desc = $request->desc;
        $property->price = $request->price;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->size = $request->size;
        $property->type = $request->type;
        $property->garage = $request->garage;

        $property->update();
        return "Property updated successfully";
    }

    public function delete($id)
    {
        $property = Property::findorFail($id);
        $property->delete();
        return "Property deleted";
    }
}
