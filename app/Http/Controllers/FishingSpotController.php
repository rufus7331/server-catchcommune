<?php

namespace App\Http\Controllers;

use App\Models\FishingSpot;
use Illuminate\Http\Request;

class FishingSpotController extends Controller
{
    public function index()
    {
        return inertia('FishingSpots', ['fishingSpots' => FishingSpot::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'description' => ['required'],
        ]);

        $fishingspot = FishingSpot::create($data);

        return response()->json($fishingspot, 201);
    }

    public function show($id)
    {
        $catchEntries = FishingSpot::find($id)->catchEntries()->with('fish', 'user')->get();

        return inertia('FishingSpotDetails', ['fishingSpot' => FishingSpot::find($id), 'catchEntries' => $catchEntries]);
    }


    public function update(Request $request, FishingSpot $fishingSpot)
    {
        $request->validate([
            'name' => ['required'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
        ]);

        $fishingSpot->update($request->validated());

        return $fishingSpot;
    }

    public function destroy(FishingSpot $fishingSpot)
    {
        $fishingSpot->delete();

        return response()->json();
    }
}
