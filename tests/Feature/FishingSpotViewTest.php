<?php

namespace Tests\Feature;

use App\Models\FishingSpot;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FishingSpotViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_view_fishing_spots()
    {
        // Tworzenie przykładowych łowisk
        $fishingSpots = FishingSpot::factory()->count(3)->create();

        // Logowanie użytkownika
        $user = User::factory()->create();
        $this->actingAs($user);

        // Wysłanie żądania
        $response = $this->getJson('/api/fishing-spots');

        // Sprawdzenie odpowiedzi
        $response->assertStatus(200);
        $response->assertJsonCount(3); // Zakładając, że używasz struktury odpowiedzi z kluczem 'data'

    }
}
