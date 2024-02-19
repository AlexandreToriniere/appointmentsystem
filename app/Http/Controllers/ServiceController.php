<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Service;
use Carbon\CarbonPeriod;
use Jenssegers\Date\Date;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Services\AppointmentService;
use App\Http\Requests\AppointmentRequest;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        $cartCollection = \Cart::getContent();
        return view('services', compact('services', 'cartCollection'));
    }

    public function show($slug){
        Carbon::setLocale('fr');
        $service = Service::where('slug', $slug)->firstorFail();
        $cartCollection = \Cart::getContent();

        $datePeriod = CarbonPeriod::create(now(), now()->addDays(7));
        // dd($datePeriod);
        $appointments = [];

        foreach ($datePeriod as $date) {

            $appointments [] = (new AppointmentService)->generateTimeData($date);
        }
        return view('appointments.reserve', compact('appointments','service', 'cartCollection'));
    }


    public function session(Request $request)
    {

        if(!auth()->check()){
            return view('auth/login');
        }else{
        //Request from checkout page
        $servicename = $request->get('servicename');
        $totalprice = str_replace([',', '.'], ['', ''],$request->get('price'));

        $two0 = "00";
        $price = "$totalprice$two0";

        $session = Session::create([

            $stripe = Stripe::setApiKey("sk_test_51L315DE6SA4XJlM8r0szc44DOR5AZVJqvKGQxEYFxS38MuEy3KTdMngyNxcFlHVV3WPw3G5XszWxCA1DyQymNf3h00MogXWg03"),
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'EUR',
                        'product_data' => [
                            "name" => $servicename,
                        ],
                        'unit_amount'  => $price,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('reserve.success', ['date' => $request->get('date'), 'time' => $request->get('time')]),
            'cancel_url'  => route('services'),
        ]);

        return redirect()->away($session->url);
        }
    }

    public function success(AppointmentRequest $request)
    {
        $data = $request->merge(['user_id'=>auth()->id()])->toArray();
        Appointment::create($data);
        return 'created';
    }
}
