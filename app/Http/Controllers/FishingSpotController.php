<?php

namespace App\Http\Controllers;

use App\Models\FishingSpot;
use Illuminate\Http\Request;

class FishingSpotController extends Controller
{
    public function index()
    {
        return FishingSpot::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
        ]);

        return FishingSpot::create($request->validated());
    }

    public function show(FishingSpot $fishingSpot)
    {
        return $fishingSpot;
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
