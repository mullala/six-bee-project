<?php

namespace Tests\Feature;

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

}
