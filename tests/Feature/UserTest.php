<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     */
    public function get_admin_users(): void
    {
       $user = User::factory()->create(); // usa un factory si lo tienes

        $response = $this->actingAs($user)->get('/admin/users');

        $response->assertStatus(200);
    }
}
