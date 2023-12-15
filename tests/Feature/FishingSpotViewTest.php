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

        // Wyświetlanie strony z łowiskami
        $response = $this->get(route('fishing-spots'));

        // Sprawdzanie czy strona została wyświetlona
        $response->assertStatus(200);

    }
}
