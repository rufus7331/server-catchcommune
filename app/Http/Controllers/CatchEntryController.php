<?php

namespace App\Http\Controllers;

use App\Models\CatchEntry;
use Illuminate\Http\Request;

class CatchEntryController extends Controller
{
    public function index()
    {
        return CatchEntry::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id', // Upewnij się, że użytkownik istnieje
            'fishing_spot_id' => 'required|exists:fishing_spots,id', // Upewnij się, że łowisko istnieje
            'fish_id' => 'required|exists:fish,id', // Upewnij się, że ryba istnieje
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'comment' => 'nullable|string', // Opcjonalny komentarz
        ]);

        $catchEntry = CatchEntry::create($validatedData);

        return response()->json($catchEntry, 201); // Zwraca status 201 przy pomyślnym utworzeniu
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
            'comment' => 'nullable|string', // Dodano typ string dla bezpieczeństwa
        ]);

        $catchEntry->update($validatedData);

        return response()->json($catchEntry, 200); // Zwraca status 200 z zaktualizowanym obiektem
    }

    public function destroy(CatchEntry $catchEntry)
    {
        $catchEntry->delete();

        return response()->json(null, 204);
    }
}
