<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function index(Request $request): View
    {
        $user = $request->user();
        if ($user) {

            $appointments = Appointment::all();
            return view('admin.appointment.index', compact(['appointments']));
        } else return view('appointment.create');
    }
}
