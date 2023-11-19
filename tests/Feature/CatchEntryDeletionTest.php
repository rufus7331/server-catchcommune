<?php

namespace Tests\Feature;

use App\Models\CatchEntry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatchEntryDeletionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_delete_a_catch_entry()
    {
        // Tworzenie i logowanie użytkownika
        $user = User::factory()->create();
        $this->actingAs($user);

        // Tworzenie wpisu zdobyczy
        $catchEntry = CatchEntry::factory()->create(['user_id' => $user->id]);

        // Wysłanie żądania usunięcia
        $response = $this->deleteJson('/api/catch-entries/' . $catchEntry->id);

        // Sprawdzenie odpowiedzi
        $response->assertStatus(204); // 204 No Content
        $this->assertDatabaseMissing('catch_entries', ['id' => $catchEntry->id]);
    }
}
