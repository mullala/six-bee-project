<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Appointment;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    /**
     * Show appointment index
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        if ($user) {

            $appointments = Appointment::all();
            return view('admin.appointment.index', compact(['appointments']));
        } else return view('appointment.create');
    }

    /**
     * Display the appointment edit form
     */
    public function edit(Request $request, Appointment $appointment): View
    {
        $user = $request->user();
        if ($user) {

            return view('admin.appointment.edit', compact(['appointment']));
        } else return view('appointment.create');
    }

    /**
     * Patch the appointment
     */
    public function update(Request $request, Appointment $appointment): RedirectResponse | Response
    {
        $user = $request->user();
        if ($user) {

            $request->validate([
                'name'           => ['required', 'string', 'max:255'],
                'date_time'      => ['required', 'string'],
                // 'date_time'      => ['required', 'date_format:Y-m-d H:i'],
                'issue'          => ['required', 'string'],
                'contact_number' => ['required', 'string', 'max:14'],
                'email_address'  => ['required', 'email'],
                'approved'       => ['sometimes', 'boolean'],
            ]);
            $appointment->update([
                'name' => $request->input('name'),
                'date_time' => $request->input('date_time'),
                'issue' => $request->input('issue'),
                'contact_number' => $request->input('contact_number'),
                'email_address' => $request->input('email_address'),
                'approved' => $request->input('approved')
            ]);


            return redirect(route('dashboard'));
        } else return Response::HTTP_FORBIDDEN;
    }

    /**
     * Delete the appointment
     */
    public function delete(Request $request, Appointment $appointment): View
    {
        $user = $request->user();
        if ($user) {

            $appointment->delete();

            return view('dashboard');
        } else return view('appointment.create');
    }
}
