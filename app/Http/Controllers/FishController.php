<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    public function index()
    {
        return Fish::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);

        return Fish::create($request->validated());
    }

    public function show(Fish $fish)
    {
        return $fish;
    }

    public function update(Request $request, Fish $fish)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
        ]);

        $fish->update($request->validated());

        return $fish;
    }

    public function destroy(Fish $fish)
    {
        $fish->delete();

        return response()->json();
    }
}
