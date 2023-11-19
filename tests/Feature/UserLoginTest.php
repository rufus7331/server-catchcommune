<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt($password = 'my-secret-password'),
        ]);

        // Act
        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Assert
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Login successful']);
    }
}
