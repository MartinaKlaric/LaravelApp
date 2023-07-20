<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MediaTest extends TestCase
{
    use RefreshDatabase;

    public function testShow(): void
    {
        $user = User::factory()->create([
            'email' => 'marko@predavaci.algebra.hr'
        ]);

        $response = $this->actingAs($user)->get('/media/cd');

        $response->assertStatus(200);
        $response->assertContent('cd');
    }
}