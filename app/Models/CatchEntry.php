<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fishingSpot(): BelongsTo
    {
        return $this->belongsTo(FishingSpot::class);
    }

    public function fish(): BelongsTo
    {
        return $this->belongsTo(Fish::class);
    }
}
