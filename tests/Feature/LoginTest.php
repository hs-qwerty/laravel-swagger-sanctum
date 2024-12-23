<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        User::factory()->create([
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/auth/login', [
            'email' => 'johndoe@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

    public function test_register()
    {
        $response = $this->postJson('/api/auth/register',
            [
                'name' => 'name',
                'email' => 'johndoe@gmail.com',
                'password' => 'password',
            ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => "registration was successful",
            ]);
    }
}
