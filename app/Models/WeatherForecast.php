<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherForecast extends Model
{
    use HasFactory;

    protected $fillable = [
        'fishing_spot_id',
        'date',
        'weather_condition',
        'temperature',
        'wind_speed',
        'precipitation',
    ];

    public function fishingSpot() {
        return $this->belongsTo(FishingSpot::class);
    }
}

