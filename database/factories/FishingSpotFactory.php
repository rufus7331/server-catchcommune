<?php

namespace Database\Factories;

use App\Models\FishingSpot;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FishingSpotFactory extends Factory
{
    protected $model = FishingSpot::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
