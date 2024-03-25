<?php

namespace Tests\Feature\Admin;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_whenGuest_thenRedirectToAppointmentBooking(): void
    {
        $response = $this
            ->get('/dashboard');

        $response->assertRedirect();
    }

    public function test_whenAdmin_thenPageShown(): void
    {
        $this->withExceptionHandling();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertOk();
        $response->assertSee('Appointments');
        $response->assertSee('Name');
        $response->assertSee('Date and time');
        $response->assertSee('Issue');
        $response->assertSee('Contact number');
        $response->assertSee('Email address');
        $response->assertSee('Approve');
    }

    public function test_whenAppointmentsExist_thenAppointmentsShown(): void
    {
        $user = User::factory()->create();
        $appointments = Appointment::factory()->count(3)->create();

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertOk();
        foreach($appointments as $appointment) {
            $response->assertSee($appointment->name);
            $response->assertSee($appointment->email);
            $response->assertSee($appointment->text);
        }
    }

}
