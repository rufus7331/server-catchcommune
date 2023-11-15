<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function catchEntries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CatchEntry::class);
    }
}
