<?php

namespace Database\Seeders;

use App\Models\FishingSpot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FishingSpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FishingSpot::factory()->count(10)->create();
    }
}
