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
        $request->validate([
            'weight' => ['required', 'numeric'],
            'length' => ['required', 'numeric'],
            'comment' => ['nullable'],
        ]);

        return CatchEntry::create($request->validated());
    }

    public function show(CatchEntry $catchEntry)
    {
        return $catchEntry;
    }

    public function update(Request $request, CatchEntry $catchEntry)
    {
        $request->validate([
            'weight' => ['required', 'numeric'],
            'length' => ['required', 'numeric'],
            'comment' => ['nullable'],
        ]);

        $catchEntry->update($request->validated());

        return $catchEntry;
    }

    public function destroy(CatchEntry $catchEntry)
    {
        $catchEntry->delete();

        return response()->json();
    }
}
