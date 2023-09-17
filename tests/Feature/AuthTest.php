<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

class AuthTest extends TestCase
{
    use WithFaker;

    public function login_with_valid_credentials()
    {

        $user = User::factory()->create([
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => 'testing@testing.com',
            'password' => bcrypt('Kodegiri123!'),
            'nohp' => '081234567890',
        ]);

        $response = $this->json('POST', 'api/login/action', [
            'email' => 'testing@testing.com',
            'password' => 'Kodegiri123!',
        ], ['Accept' => 'application/json']);

        $response->assertStatus(200)->assertJsonStructure(
            [
                'token',
            ]
        );
    }

    public function login_with_not_valid_credentials()
    {

        $response = $this->json('POST', 'api/login/action', [
            'email' => 'admin@admin.com',
            'password' => 'Kodegisri123!',
        ], ['Accept' => 'application/json']);

        $response->assertStatus(400)->assertJsonStructure(
            [
                'error',
            ]
        );
    }

    public function test_user_can_register()
    {

        $userData = [
            'id' => (string) Str::uuid(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'Kodegiri123!',
            'k_password' => 'Kodegiri123!',
            'no_hp' => '081234567890',
        ];

        $response = $this->json('POST', '/api/register/action', $userData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'user',
                'token',
            ]);
    }
}
