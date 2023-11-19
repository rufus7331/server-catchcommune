<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_update_their_profile()
    {
        // Arrange
        $user = User::factory()->create();
        $newData = [
            'name' => 'Updated Name',
        ];

        // Act
        $user->update($newData);

        // Assert
        $this->assertEquals('Updated Name', $user->fresh()->name);
    }
}
