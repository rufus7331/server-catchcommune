<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FishingSpotCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_fishing_spot()
    {
        // Tworzenie i logowanie użytkownika
        $user = User::factory()->create();
        $this->actingAs($user);

        // Dane łowiska
        $fishingSpotData = [
            'name' => 'Lake Paradise',
            'latitude' => 52.123456,
            'longitude' => 21.123456,
        ];

        // Wysłanie żądania
        $response = $this->postJson('/api/fishing-spots', $fishingSpotData);

        // Sprawdzenie odpowiedzi
        $response->assertStatus(201);
        $this->assertDatabaseHas('fishing_spots', ['name' => 'Lake Paradise']);
    }
}
