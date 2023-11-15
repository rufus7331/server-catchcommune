<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'catch_entry_id',
        'path',
        'caption',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function catchEntry() {
        return $this->belongsTo(CatchEntry::class);
    }
}

