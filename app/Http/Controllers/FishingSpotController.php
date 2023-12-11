<?php

namespace App\Http\Controllers;

use App\Models\FishingSpot;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

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
        ]);

        $fishingspot = FishingSpot::create($data);

        return response()->json($fishingspot, 201);
    }

    public function show($id)
    {
        return inertia('FishingSpotDetails', ['fishingSpot' => FishingSpot::find($id)]);
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
