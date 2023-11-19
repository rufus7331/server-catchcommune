<?php

namespace Tests\Unit;

use App\Models\CatchEntry;
use App\Models\User;
use App\Models\FishingSpot;
use App\Models\Fish;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatchEntryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_catch_entry()
    {
        // Arrange
        $user = User::factory()->create();
        $fishingSpot = FishingSpot::factory()->create();
        $fish = Fish::factory()->create();

        $data = [
            'user_id' => $user->id,
            'fishing_spot_id' => $fishingSpot->id,
            'fish_id' => $fish->id,
            'weight' => 5.5,
            'length' => 20.0,
            'comment' => 'Great catch!'
        ];

        // Act
        $catchEntry = CatchEntry::create($data);

        // Assert
        $this->assertInstanceOf(CatchEntry::class, $catchEntry);
        $this->assertEquals($user->id, $catchEntry->user_id);
        $this->assertEquals($fishingSpot->id, $catchEntry->fishing_spot_id);
        $this->assertEquals($fish->id, $catchEntry->fish_id);
        $this->assertEquals(5.5, $catchEntry->weight);
        $this->assertEquals(20.0, $catchEntry->length);
        $this->assertEquals('Great catch!', $catchEntry->comment);
    }
}
