<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatchEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fishing_spot_id',
        'fish_id',
        'weight',
        'length',
        'comment',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function fishingSpot() {
        return $this->belongsTo(FishingSpot::class);
    }

    public function fish() {
        return $this->belongsTo(Fish::class);
    }
}
