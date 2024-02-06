<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use Carbon\CarbonPeriod;
use App\Models\Appointment;
use App\Services\AppointmentService;

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
        dd($data);
        Appointment::create($data);

        return 'created';

    }
}
