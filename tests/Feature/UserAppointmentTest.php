<?php

namespace Tests\Feature;

use App\Models\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAppointmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_whenGuest_thenAppointmentPageDisplayed(): void
    {
        $this->withoutExceptionHandling();

        $response = $this
            ->get('/');

        $response->assertOk();
        $response->assertSee('Book an appointment');
        $response->assertSee('Your name');
        $response->assertSee('Appointment date and time');
        $response->assertSee('Describe your issue');
        $response->assertSee('Contact number');
        $response->assertSee('Email address');
    }


    public function test_whenGuestAndDataValid_thenAppointmentStored(): void
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'name' => 'Imoen',
            'date_time' => '2024-05-22 10:20',
            'issue' => 'Twisted ankle',
            'contact_number' => '0055504232322',
            'email_address' => 'test@test.com',
        ];

        $response = $this
            ->post('appointment', $attributes);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/appointment');

        $this->assertDatabaseHas('appointments', [
            "id" => 1,
            "name" => "Imoen",
            "date_time" => "2024-05-22 10:20",
            "issue" => "Twisted ankle",
            "contact_number" => "0055504232322",
            "email_address" => "test@test.com",
            "approved" => 0
        ]);
    }
}
