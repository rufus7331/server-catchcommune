<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishingSpot extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
    ];
}
