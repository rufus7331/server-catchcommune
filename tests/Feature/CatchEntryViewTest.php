<?php

namespace Tests\Feature;

use App\Models\CatchEntry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatchEntryViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_a_catch_entry_details()
    {
        // Tworzenie i logowanie użytkownika
        $user = User::factory()->create();
        $this->actingAs($user);

        // Tworzenie wpisu zdobyczy
        $catchEntry = CatchEntry::factory()->create(['user_id' => $user->id]);

        // Wysłanie żądania pobrania szczegółów zdobyczy
        $response = $this->getJson('/api/catch-entries/' . $catchEntry->id);

        // Sprawdzenie odpowiedzi
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $catchEntry->id,
            'user_id' => $user->id,
            'fishing_spot_id' => $catchEntry->fishing_spot_id,
            'fish_id' => $catchEntry->fish_id,
            'weight' => $catchEntry->weight,
            'length' => $catchEntry->length,
            'comment' => $catchEntry->comment,
        ]);
    }
}
