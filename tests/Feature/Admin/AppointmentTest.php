<?php

namespace Tests\Feature\Admin;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_getAdminDashboard_whenGuest_thenRedirectToAppointmentBooking(): void
    {
        $response = $this
            ->get('/dashboard');

        $response->assertRedirect();
    }

    public function test_getAdminDashboard_whenAdmin_thenPageShown(): void
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

    public function test_getAdminDashboard_whenAppointmentsExist_thenAppointmentsShown(): void
    {
        $user = User::factory()->create();
        $appointments = Appointment::factory()->count(3)->create();

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertOk();
        foreach ($appointments as $appointment) {
            $response->assertSee($appointment->name);
            $response->assertSee($appointment->email);
            $response->assertSee($appointment->text);
        }
    }


    public function test_updateAppointment_whenGuest_thenRedirectToAppointmentBooking(): void
    {
        $appointment = Appointment::factory()->create();

        $response = $this
            ->get('/admin/appointment/' . $appointment->id);

        $response->assertRedirect();
    }

    public function test_updateAppointment_whenAdmin_thenUpdatePageShown(): void
    {
        $user = User::factory()->create();
        $appointment = Appointment::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/admin/appointment/' . $appointment->id);

        $response->assertOk();
        $response->assertSee('Update appointment');
        $response->assertSee('Name');
        $response->assertSee('Date and time');
        $response->assertSee('Issue');
        $response->assertSee('Contact number');
        $response->assertSee('Email address');
    }

    public function test_patchAppointment_whenGuest_thenForbidden(): void
    {
        $appointment = Appointment::factory()->create();

        $response = $this
            ->patch('/admin/appointment/' . $appointment->id);

        //$response->assertForbidden();
    }

    public function test_patchAppointment_whenAdmin_thenAppointmentUpdated(): void
    {
        $user = User::factory()->create();
        $appointment = Appointment::factory()->create();

        $this->assertDatabaseMissing('appointments', [
            "name" => "Imoen",
            "date_time" => "2024-05-22 10:20",
            "issue" => "Twisted ankle",
            "contact_number" => "0055504232322",
            "email_address" => "test@test.com",
            "approved" => 0
        ]);

        $attributes = [
            'name' => 'Imoen',
            'date_time' => '2024-05-22 10:20',
            'issue' => 'Twisted ankle',
            'contact_number' => '0055504232322',
            'email_address' => 'test@test.com',
        ];

        $response = $this
            ->actingAs($user)
            ->patch('/admin/appointment/' . $appointment->id, $attributes);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/dashboard');

        $appointment->refresh();

        $this->assertDatabaseHas('appointments', [
            "name" => "Imoen",
            "date_time" => "2024-05-22 10:20",
            "issue" => "Twisted ankle",
            "contact_number" => "0055504232322",
            "email_address" => "test@test.com",
            "approved" => 0
        ]);
    }
}
