<?php

namespace Tests\Feature;

use App\Models\CatchEntry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatchEntryListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_list_of_catch_entries()
    {
        // Tworzenie i logowanie użytkownika
        $user = User::factory()->create();
        $this->actingAs($user);

        // Tworzenie kilku wpisów zdobyczy
        $entries = CatchEntry::factory()->count(5)->create(['user_id' => $user->id]);

        // Wysłanie żądania pobrania listy zdobyczy
        $response = $this->getJson('/api/catch-entries');

        // Sprawdzenie odpowiedzi
        $response->assertStatus(200);
        $response->assertJsonCount(5); // Zakładając, że używasz klucza 'data' w odpowiedzi
    }
}
