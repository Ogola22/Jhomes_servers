<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;


class ApiPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return $properties;
    }

    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'image' => 'image|max:1028',
        ]);
        $property = new Property();
        $property->title = $request->title;
        $property->location = $request->location;
        $property->desc = $request->desc;
        $property->price = $request->price;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->size = $request->size;
        $property->type = $request->type;
        $property->garage = $request->garage;
        //$property->image_path = $request->file('image')->store('public/images');


        $property->save();
        return "Property Saved Successfylly";

    }
    public function show($id)
    {
        $property = Property::findorFail($id);
        return $property;
    }
    public function update(string $id, Request $request)
    {
        $property = Property::findorFail($id);
        $request->validate([

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
        //$property->image_path = $request->image_path;

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
