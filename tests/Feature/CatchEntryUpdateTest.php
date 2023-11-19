<?php

namespace Tests\Feature;

use App\Models\CatchEntry;
use App\Models\Fish;
use App\Models\FishingSpot;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatchEntryUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    /** @test */
    public function user_can_update_a_catch_entry()
    {
        // Tworzenie i logowanie użytkownika
        $user = User::factory()->create();
        $this->actingAs($user);

        // Tworzenie łowiska i ryby (załóżmy, że masz odpowiednie fabryki)
        $fishingSpot = FishingSpot::factory()->create();
        $fish = Fish::factory()->create();

        // Tworzenie istniejącego wpisu zdobyczy z wymaganymi polami
        $catchEntry = CatchEntry::factory()->create([
            'user_id' => $user->id,
            'fishing_spot_id' => $fishingSpot->id,
            'fish_id' => $fish->id,
            // inne wymagane pola
        ]);

        // Dane do aktualizacji
        $updatedData = [
            'weight' => 6.5, // Zaktualizowane dane
            'length' => 30.0,
            // inne wymagane pola
        ];

        // Wysłanie żądania aktualizacji
        $response = $this->putJson('/api/catch-entries/' . $catchEntry->id, $updatedData);

        // Sprawdzenie odpowiedzi
        $response->assertStatus(200);
        $this->assertDatabaseHas('catch_entries', ['id' => $catchEntry->id, 'weight' => 6.5]);
    }

}
