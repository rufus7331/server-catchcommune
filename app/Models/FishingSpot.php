<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FishingSpot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'description',
    ];

    public function weatherForecasts(): HasMany
    {
        return $this->hasMany(WeatherForecast::class);
    }

    public function catchEntries(): HasMany
    {
        return $this->hasMany(CatchEntry::class);
    }
}
