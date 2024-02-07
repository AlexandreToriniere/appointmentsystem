<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\BusinessHour;


class AppointmentService{

    public function generateTimeData(Carbon $date)
    {
            $dayName = $date->format('l');

            $businessHours = BusinessHour::where('day',$dayName)->first();

            $hours = array_filter($businessHours->TimesPeriod);

            //Une requête au Model Appointment où on récupère la date. On retourne le champ time avec la fonction pluck() et on finit par retourner le format du résultat de pluck().
            $currentAppointments = Appointment::where('date', $date->toDateString())->pluck('time')->map(function($time){
                return $time->format('H:i');
            })->toArray();

            // On récupère les valeurs entre deux tableaux. On retiendra les valeurs du tableaux $hours qui ne sont pas dans $currentAppointments
           $availbleHours = array_diff($hours,$currentAppointments);

           return [
                'day_name' => $dayName,
                'date' => $date->format('d M'),
                'full_date' => $date->format('Y-m-d'),
                'available_hours' => $availbleHours,
                'reserved_hours' => $currentAppointments,
                'business_hours' => $hours,
                'off' => $businessHours->off
            ];
    }
}
