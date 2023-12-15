<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_an_article()
    {
        // Tworzenie i logowanie użytkownika
        $user = User::factory()->create();
        $this->actingAs($user);

        // Dane artykułu
        $articleData = [
            'title' => 'The Secrets of Successful Fishing',
            'content' => 'Content of the article...',
        ];

        // Tworzenie artykułu
        $response = $this->post(route('articles.store'), $articleData);

        // Sprawdzanie czy artykuł został utworzony
        $this->assertDatabaseHas('articles', $articleData);
    }
}
