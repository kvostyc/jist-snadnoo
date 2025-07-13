<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function homepage_is_accessible()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    #[Test]
    public function user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }
}
