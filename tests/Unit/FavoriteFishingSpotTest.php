<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\FishingSpot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FavoriteFishingSpotTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_fishing_spot_to_favorites()
    {
        // Arrange
        $user = User::factory()->create();
        $fishingSpot = FishingSpot::factory()->create();

        // Act
        $user->addToFavorites($fishingSpot);

        // Assert
        $this->assertTrue($user->favorites->contains($fishingSpot));
    }
}
