<?php

namespace App\Http\Controllers;

use App\Models\WeatherForecast;
use Illuminate\Http\Request;

class WeatherForecastController extends Controller
{
    public function index()
    {
        return WeatherForecast::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => ['required', 'date'],
            'weather_condition' => ['required'],
            'temperature' => ['required', 'numeric'],
            'wind_speed' => ['nullable', 'numeric'],
            'precipitation' => ['nullable', 'numeric'],
        ]);

        return WeatherForecast::create($request->validated());
    }

    public function show(WeatherForecast $weatherForecast)
    {
        return $weatherForecast;
    }

    public function update(Request $request, WeatherForecast $weatherForecast)
    {
        $request->validate([
            'date' => ['required', 'date'],
            'weather_condition' => ['required'],
            'temperature' => ['required', 'numeric'],
            'wind_speed' => ['nullable', 'numeric'],
            'precipitation' => ['nullable', 'numeric'],
        ]);

        $weatherForecast->update($request->validated());

        return $weatherForecast;
    }

    public function destroy(WeatherForecast $weatherForecast)
    {
        $weatherForecast->delete();

        return response()->json();
    }
}
