<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return Image::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'path' => ['required'],
            'caption' => ['nullable'],
        ]);

        return Image::create($request->validated());
    }

    public function show(Image $image)
    {
        return $image;
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'path' => ['required'],
            'caption' => ['nullable'],
        ]);

        $image->update($request->validated());

        return $image;
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return response()->json();
    }
}
