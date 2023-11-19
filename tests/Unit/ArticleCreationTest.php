<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_article()
    {
        // Arrange
        $user = User::factory()->create();
        $articleData = [
            'user_id' => $user->id,
            'title' => 'Sample Article Title',
            'content' => 'This is the content of the article.',
        ];

        // Act
        $article = Article::create($articleData);

        // Assert
        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals('Sample Article Title', $article->title);
        $this->assertEquals('This is the content of the article.', $article->content);
        $this->assertEquals($user->id, $article->user_id);
    }
}
