<?php

namespace Tests\Feature;

use App\Models\CatchEntry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\FishingSpot;
use App\Models\Fish;

class CatchEntryCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_catch_entry()
    {
        // Tworzenie i logowanie użytkownika
        $user = User::factory()->create();
        $this->actingAs($user);

        // Tworzenie łowiska i ryby
        $fishingSpot = FishingSpot::factory()->create();
        $fish = Fish::factory()->create();

        // Dane zdobyczy
        $catchEntryData = [
            'user_id' => $user->id,
            'fishing_spot_id' => $fishingSpot->id,
            'fish_id' => $fish->id,
            'weight' => 5.5,
            'length' => 25.0,
            // inne wymagane pola
        ];

        // Wysłanie żądania
        $response = $this->postJson('/api/catch-entries', $catchEntryData);

        // Sprawdzenie odpowiedzi
        $response->assertStatus(201);
        $this->assertDatabaseHas('catch_entries', ['weight' => 5.5]);
    }
}
