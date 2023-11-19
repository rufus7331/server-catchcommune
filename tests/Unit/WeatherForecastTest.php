<?php

namespace Tests\Unit;

use App\Models\WeatherForecast;
use App\Models\FishingSpot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WeatherForecastTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_weather_forecast_for_a_fishing_spot()
    {
        // Arrange
        $fishingSpot = FishingSpot::factory()->create();
        $forecastData = [
            'fishing_spot_id' => $fishingSpot->id,
            'date' => '2023-01-01',
            'weather_condition' => 'Sunny',
            'temperature' => 25,
            'wind_speed' => 10,
            'precipitation' => 0,
        ];

        // Act
        $forecast = WeatherForecast::create($forecastData);

        // Assert
        $this->assertInstanceOf(WeatherForecast::class, $forecast);
        $this->assertEquals($fishingSpot->id, $forecast->fishing_spot_id);
        $this->assertEquals('2023-01-01', $forecast->date);
        $this->assertEquals('Sunny', $forecast->weather_condition);
        $this->assertEquals(25, $forecast->temperature);
        $this->assertEquals(10, $forecast->wind_speed);
        $this->assertEquals(0, $forecast->precipitation);
    }
}

