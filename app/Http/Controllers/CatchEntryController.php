<?php

namespace App\Http\Controllers;

use App\Models\CatchEntry;
use App\Models\Fish;
use App\Models\FishingSpot;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatchEntryController extends Controller
{
    public function index()
    {
        $entries = CatchEntry::with('user', 'fish', 'fishingSpot')->get();

        return inertia('CatchEntries', ['entries' => $entries]);
    }

    public function create()
    {
        $fish = Fish::all();
        $fishingSpot = FishingSpot::all();

        return inertia('CreateEntry', ['fish' => $fish, 'fishingSpot' => $fishingSpot]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'fishing_spot_id' => 'required|exists:fishing_spots,id',
            'fish_id' => 'required|exists:fish,id',
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'comment' => 'nullable|string',
        ]);

        $catchEntry = CatchEntry::create($validatedData);

        return Inertia::location(route('catch-entries'));
    }

    public function show(CatchEntry $catchEntry)
    {
        return $catchEntry;
    }

    public function update(Request $request, CatchEntry $catchEntry)
    {
        $validatedData = $request->validate([
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'comment' => 'nullable|string',
        ]);

        $catchEntry->update($validatedData);

        return response()->json($catchEntry, 200);
    }

    public function destroy(CatchEntry $catchEntry)
    {
        $catchEntry->delete();

        return response()->json(null, 204);
    }
}
