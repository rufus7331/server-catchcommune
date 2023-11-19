<?php

namespace Tests\Unit;

use App\Models\Fish;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FishTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_fish()
    {
        // Arrange
        $data = [
            'name' => 'Trout',
            'description' => 'A freshwater fish.'
        ];

        // Act
        $fish = Fish::create($data);

        // Assert
        $this->assertInstanceOf(Fish::class, $fish);
        $this->assertEquals('Trout', $fish->name);
        $this->assertEquals('A freshwater fish.', $fish->description);
    }
}
