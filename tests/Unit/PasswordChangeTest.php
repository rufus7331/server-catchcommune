<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordChangeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_change_their_password()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt($oldPassword = 'oldPassword')
        ]);
        $newPassword = 'newPassword';

        // Act
        $user->update([
            'password' => bcrypt($newPassword)
        ]);

        // Assert
        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
        $this->assertFalse(Hash::check($oldPassword, $user->fresh()->password));
    }
}
