<?php

namespace Database\Factories;

use App\Models\CatchEntry;
use App\Models\Fish;
use App\Models\FishingSpot;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CatchEntryFactory extends Factory
{
    protected $model = CatchEntry::class;

    public function definition(): array
    {
        return [
            'fishing_spot_id' => function () {
                return FishingSpot::factory()->create()->id;
            },
            'fish_id' => function () {
                return Fish::factory()->create()->id;
            },
            'weight' => $this->faker->randomFloat(2, 0.1, 100),
            'length' => $this->faker->randomFloat(2, 1, 200),
            'comment' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
