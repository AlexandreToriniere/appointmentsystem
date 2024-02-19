<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use App\Models\BusinessHour;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForvalidation()
    {
        $this->isValid();
    }

    public function rules()
    {
        return [
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => ['required', 'date_format:H:i']
        ];
    }

    public function isValid()
    {

        $dayName = $this->date('date')->isoformat('dddd');
        $businessHours = BusinessHour::where('day', $dayName)->first()->TimesPeriod;

        if (!in_array($this->input('time'), $businessHours)) {
            abort(422, 'invalid time');
        }

        $isAlreadyExists = Appointment::where('date', $this->input('date'))->where('time', $this->input('timùe'))->exists();

        if($isAlreadyExists){
            abort(422, 'Already Taken');
        }

        return true;
    }
}
