<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'path'=>'',
        ]);

        // Store the uploaded file
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image = new Images();
            $image->path = $imagePath;
            $image->save();

            return response()->json(['message' => 'Image uploaded successfully']);
        }

        return response()->json(['message' => 'Image upload failed'], 500);
    }
}
