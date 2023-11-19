<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\User;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_comment_to_an_article()
    {
        // Arrange
        $user = User::factory()->create();
        $article = Article::factory()->create();

        $commentData = [
            'user_id' => $user->id,
            'article_id' => $article->id,
            'body' => 'This is a test comment.',
        ];

        // Act
        $comment = Comment::create($commentData);

        // Assert
        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertEquals($user->id, $comment->user_id);
        $this->assertEquals($article->id, $comment->article_id);
        $this->assertEquals('This is a test comment.', $comment->body);
    }
}
