<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_only_admin_can_list_users()
    {
        $user = User::factory()->create(['role' => 'user']);
        $token = $user->createToken('test_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token",
        ])->get('/api/users');

        $response->assertStatus(403);
    }
}
