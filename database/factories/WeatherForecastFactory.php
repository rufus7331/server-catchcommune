<?php

namespace Database\Factories;

use App\Models\WeatherForecast;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WeatherForecastFactory extends Factory
{
    protected $model = WeatherForecast::class;

    public function definition(): array
    {
        return [
            'date' => Carbon::now(),
            'weather_condition' => $this->faker->word(),
            'temperature' => $this->faker->randomFloat(),
            'wind_speed' => $this->faker->randomFloat(),
            'precipitation' => $this->faker->randomFloat(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
