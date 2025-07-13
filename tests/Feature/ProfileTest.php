<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Reservation\Reservation;
use App\Models\Reservation\ReservationStatus;
use App\Models\Table\Table;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    #[Test]
    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $user->refresh();

        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@example.com', $user->email);
        $this->assertNull($user->email_verified_at);
    }

    #[Test]
    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => $user->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    #[Test]
    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/profile', [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    #[Test]
    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        $this->assertNotNull($user->fresh());
    }

    #[Test]
    public function test_my_reservations_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/my-reservations');

        $response->assertOk();
        $response->assertViewIs('profile.my-reservations');
    }

    #[Test]
    public function test_my_reservations_page_shows_empty_table_when_no_reservations(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/my-reservations');

        $response->assertOk();
        $response->assertSee(__('reservation.no_reservations'));
    }

    #[Test]
    public function test_my_reservations_page_shows_reservations_table_with_data(): void
    {
        $user = User::factory()->create();
        $status = ReservationStatus::factory()->create(['name' => 'Rezervované']);
        $table = Table::factory()->create(['name' => 'Stôl 1']);
        
        $reservation = Reservation::factory()->create([
            'user_id' => $user->id,
            'reservation_status_id' => $status->id,
            'table_id' => $table->id,
            'date' => now()->addDays(5)->toDateString(),
            'time' => '18:00',
            'guest_count' => 4,
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/my-reservations');

        $response->assertOk();
        $response->assertSee($table->name);
        $response->assertSee($status->name);
        $response->assertSee('4'); // guest count
        $response->assertSee('18:00'); // time
        $response->assertSee(now()->addDays(5)->format('d.m.Y')); // date
    }

    #[Test]
    public function test_my_reservations_page_shows_only_user_reservations(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $status = ReservationStatus::factory()->create();
        $table = Table::factory()->create();
        
        // User 1 reservation
        $reservation1 = Reservation::factory()->create([
            'user_id' => $user1->id,
            'reservation_status_id' => $status->id,
            'table_id' => $table->id,
            'date' => now()->addDays(5)->toDateString(),
            'time' => '18:00',
            'guest_count' => 4,
        ]);

        // User 2 reservation
        $reservation2 = Reservation::factory()->create([
            'user_id' => $user2->id,
            'reservation_status_id' => $status->id,
            'table_id' => $table->id,
            'date' => now()->addDays(6)->toDateString(),
            'time' => '19:00',
            'guest_count' => 2,
        ]);

        $response = $this
            ->actingAs($user1)
            ->get('/my-reservations');

        $response->assertOk();
        $response->assertSee('18:00'); // User 1's reservation time
        $response->assertDontSee('19:00'); // User 2's reservation time should not be visible
    }

    #[Test]
    public function test_my_reservations_page_requires_authentication(): void
    {
        $response = $this->get('/my-reservations');

        $response->assertRedirect('/login');
    }
}
