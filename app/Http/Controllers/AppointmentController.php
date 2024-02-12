<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Service;
use Carbon\CarbonPeriod;
use App\Models\Appointment;
use Stripe\Checkout\Session;
use App\Services\AppointmentService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    public function index()
    {

        $datePeriod = CarbonPeriod::create(now(), now()->addDays(7));

        $appointments = [];

        foreach ($datePeriod as $date) {

            $appointments [] = (new AppointmentService)->generateTimeData($date);
        }
        return view('appointments.reserve', compact('appointments'));
    }

    public function reserve(AppointmentRequest $request)
    {
        $data = $request->merge(['user_id'=>auth()->id()])->toArray();
        Appointment::create($data);
        return 'created';
    }

}
