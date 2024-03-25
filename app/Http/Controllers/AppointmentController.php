<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Display the appointment edit form
     */
    public function create(Request $request): View
    {
        return view('appointment.create');
    }


    /**
     * Store the appointment in the database
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'date_time'      => ['required', 'date_format:Y-m-d H:i'],
            'issue'          => ['required', 'string'],
            'contact_number' => ['required', 'string', 'max:14'],
            'email_address'  => ['required', 'email'],
        ]);

        $appointment = Appointment::create([
            'name' => $request->input('name'),
            'date_time' => $request->input('date_time'),
            'issue' => $request->input('issue'),
            'contact_number' => $request->input('contact_number'),
            'email_address' => $request->input('email_address')
        ]);

        return redirect(route('appointment'));
    }
}
