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
        ];

        // Tworzenie zdobyczy
        $response = $this->post(route('catch-entries.store'), $catchEntryData);

        // Sprawdzanie czy zdobycz została utworzona
        $this->assertDatabaseHas('catch_entries', $catchEntryData);
    }
}
