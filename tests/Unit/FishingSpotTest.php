<?php

namespace Tests\Unit;

use App\Models\FishingSpot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FishingSpotTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_fishing_spot()
    {
        // Arrange
        $data = [
            'name' => 'Lake Paradise',
            'latitude' => 40.7128,
            'longitude' => -74.0060,
            'description' => 'This is a beautiful lake',
        ];

        // Act
        $fishingSpot = FishingSpot::create($data);

        // Assert
        $this->assertInstanceOf(FishingSpot::class, $fishingSpot);
        $this->assertEquals('Lake Paradise', $fishingSpot->name);
        $this->assertEquals(40.7128, $fishingSpot->latitude);
        $this->assertEquals(-74.0060, $fishingSpot->longitude);
    }
}

