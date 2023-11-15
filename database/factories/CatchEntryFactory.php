<?php

namespace Database\Factories;

use App\Models\CatchEntry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CatchEntryFactory extends Factory
{
    protected $model = CatchEntry::class;

    public function definition()
    {
        return [
            'weight' => $this->faker->randomFloat(),
            'length' => $this->faker->randomFloat(),
            'comment' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
