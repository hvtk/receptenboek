<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageUploadController extends Controller
{
    public function index()
    {
        //GET
        return view('/recipes/image-upload');

    }

    public function upload(Request $request)
    {
        //POST
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/uploads');

        $save = new Image;

        $save->name = $name;
        $save->path = $path;

        $save->save();

        return redirect('image')->with('status', 'Image has been uploaded successfully with validation in laravel');
    }
}
