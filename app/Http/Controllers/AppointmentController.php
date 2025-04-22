<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Dentist;
use App\Models\Service;
use App\Models\User;
use App\Notifications\AppointmentConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Traite la demande de rendez-vous
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dentist_id' => 'required|exists:dentists,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);
        // dd($validated);
        try {
            $dentist = Dentist::findOrFail($validated['dentist_id']);
            $patient = Auth::user();

            Carbon::setLocale('fr');


            $appointmentDay = Carbon::parse($validated['date'])->translatedFormat('l');
            $appointmentTime = Carbon::parse($validated['time'])->format('H:i');

            $appointmentDayAndTime = $validated['date'] . ' ' . $validated['time'] . ':00';
            // dd($appointmentDayAndTime);


            DB::beginTransaction();

            try {
                $appointment = new Appointment();
                $appointment->patient_id = $patient->id;
                $appointment->dentist_id = $dentist->id;
                $appointment->date = $appointmentDay;
                $appointment->status = 'En attente';

                $av_days = json_decode($dentist->available_slots, true)['days'];

                $start_time = json_decode($dentist->available_slots, true)['start_time'];
                $startTime = Carbon::createFromFormat('H:i', $start_time);

                $break_start = json_decode($dentist->available_slots, true)['break_start'];
                $breakStart = Carbon::createFromFormat('H:i', $break_start)
                    ->copy()
                    ->subMinutes(intval(json_decode($dentist->available_slots, true)['appointment_duration']));

                $break_end  = json_decode($dentist->available_slots, true)['break_end'];
                $breakEnd = Carbon::createFromFormat('H:i', $break_end);

                $end_time  = json_decode($dentist->available_slots, true)['end_time'];
                $endTime = Carbon::createFromFormat('H:i', $end_time)
                    ->copy()
                    ->subMinutes(intval(json_decode($dentist->available_slots, true)['appointment_duration']));

                $appointmentTimeFormat = Carbon::createFromFormat('H:i', $appointmentTime);

                // dd($av_days, $startTime, $breakStart, $breakEnd, $endTime);

                foreach ($av_days as $day) {
                    // dd($day);
                    if (strtolower($appointmentDay) == strtolower($day)) {
                        // dd($day);
                        if ($appointmentTimeFormat->between($startTime, $breakStart) || $appointmentTimeFormat->between($breakEnd, $endTime)) {
                            // dd($day);
                            foreach ($dentist->appointments as $appointement) {
                                // dd($appointement->date);
                                $apt_date = Carbon::createFromFormat('Y-m-d H:i:s', $appointement->date);

                                $apt_date_end =  $apt_date->copy()
                                    ->addMinutes(intval(json_decode($dentist->available_slots, true)['appointment_duration']));

                                $apt_date_and_time = Carbon::createFromFormat('Y-m-d H:i:s', $appointmentDayAndTime);

                                // dd($apt_date, $apt_date_end, $apt_date_and_time);

                                if ($apt_date_and_time->between($apt_date, $apt_date_end)) {
                                    // return redirect()->back()
                                    //     ->with('error', 'Une erreur est survenue lors de la prise de rendez-vous, la date selectionee est occupee . Veuillez réessayer.')
                                    //     ->withInput();
                                    dd('occupe');
                                } else {
                                    // if () {
                                    //     # code...
                                    // } else {
                                    echo "good range";
                                    dd();
                                    // }
                                }
                                dd($appointment->date);
                            }
                            // $appointment->save();
                            dd('ssss');
                        } else {
                            dd('nope');
                        }
                    }
                }

                // $patient->notify(new AppointmentConfirmation($appointment));

                DB::commit();

                return redirect()->route('appointments.confirmation', $appointment->id)
                    ->with('success', 'Votre rendez-vous a été confirmé avec succès!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()
                    ->with('error', 'Une erreur est survenue lors de la prise de rendez-vous. Veuillez réessayer.')
                    ->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Erreur lors du traitement du rendez-vous: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue. Veuillez réessayer.')
                ->withInput();
        }
    }
}
