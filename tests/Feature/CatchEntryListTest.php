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

        // Wyświetlanie strony z wpisami
        $response = $this->get(route('catch-entries'));

        // Sprawdzanie czy strona została wyświetlona
        $response->assertStatus(200);
    }
}
