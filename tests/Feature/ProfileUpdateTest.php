<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_update()
    {
        $user = User::factory()->create();

        Livewire::test('edit-profile', [
            'user' => $user
        ]);

        // No idea how this works, need to read up on testing...
    }
}
