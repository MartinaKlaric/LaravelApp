<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function testGetRoles(): void
    {
        $response = $this->get('/role');

        $response->assertStatus(200);
        $response->assertJson([
            [
                'id' => 1,
                'name' => 'User'
            ], 
            [
                'id' => 2,
                'name' => 'Administrator'
            ],
        ]);
    }

    public function testPostRoles(): void
    {
        $response = $this->postJson('/role', ['name' => 'Author']);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('role.index');

        $response = $this->get('/role');

        $response->assertStatus(200);
        $response->assertJson([
            [
                'id' => 1,
                'name' => 'User'
            ], 
            [
                'id' => 2,
                'name' => 'Administrator'
            ],
            [
                'id' => 3,
                'name' => 'Author'
            ],
        ]);
    }
}