<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
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

        $currentuser = Auth::user()->name;

        $datePeriod = CarbonPeriod::create(now(), now()->addDays(7));

        $appointments = [];

        foreach ($datePeriod as $date) {

            $appointments [] = (new AppointmentService)->generateTimeData($date);
        }
        return view('appointments.reserve', compact('appointments'));
    }

    public function reserve(AppointmentRequest $request)
    {

        if(!auth()->check()){
            return view('auth/login');
        }else{
            $data = $request->merge(['user_id'=>auth()->id()])->toArray();
            Appointment::create($data);
            return 'created';
    }


    }

    public function success(){
        return "Merci pour votre confiance";
    }
}
