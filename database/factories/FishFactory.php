<?php

namespace Database\Factories;

use App\Models\Fish;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FishFactory extends Factory
{
    protected $model = Fish::class;

    protected $fishNames = [
        'Carp', 'Catfish', 'Bass', 'Trout', 'Salmon', 'Pike',
        'Perch', 'Tuna', 'Sardine', 'Mackerel', 'Sturgeon', 'Amur',
    ];

    public function definition(): array
    {
        $fishName = $this->faker->randomElement($this->fishNames);

        return [
            'name' => $fishName,
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
