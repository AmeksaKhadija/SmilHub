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


        try {
            $dentist = Dentist::findOrFail($validated['dentist_id']);
            $patient = Auth::user()->patient;

            // dd($patient);

            Carbon::setLocale('fr');

            $appointmentDay = Carbon::parse($validated['date'])->translatedFormat('l');
            $appointmentTime = Carbon::parse($validated['time'])->format('H:i');

            $appointmentDayAndTime = $validated['date'] . ' ' . $validated['time'] . ':00';

            DB::beginTransaction();

            try {
                $appointment = new Appointment();
                $appointment->patient_id = $patient->id;
                $appointment->dentist_id = $dentist->id;
                $appointment->date = $appointmentDayAndTime;
                $appointment->status = 'pending';

                $av_days = json_decode($dentist->available_slots, true)['days'];

                if (!in_array(strtolower($appointmentDay), array_map('strtolower', $av_days))) {
                    return redirect()->back()
                        ->with('error', 'Le dentiste ne travaille pas le jour sélectionné. Veuillez choisir un autre jour.')
                        ->withInput();
                }

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

                $counter = 0;
                // dd($appointment);
                foreach ($av_days as $day) {
                    if (strtolower($appointmentDay) == strtolower($day)) {
                        if ($appointmentTimeFormat->between($startTime, $breakStart) || $appointmentTimeFormat->between($breakEnd, $endTime)) {
                            foreach ($dentist->appointments as $appointement) {

                                $apt_date = Carbon::createFromFormat('Y-m-d H:i:s', $appointement->date);
                                $apt_date_end =  $apt_date->copy()
                                    ->addMinutes(intval(json_decode($dentist->available_slots, true)['appointment_duration']));

                                $apt_date_and_time = Carbon::createFromFormat('Y-m-d H:i:s', $appointmentDayAndTime);

                                if ($apt_date_and_time->between($apt_date, $apt_date_end)) {

                                    $counter++;
                                    // dd('occupe');
                                }
                            }
                            // dd('ssss');
                        } else {
                            // dd('nope');
                            return redirect()->back()
                                ->with('error', 'le dentiste est occupé dans cette date sélectionnée. Veuillez réessayer.')
                                ->withInput();
                        }

                        break;
                    }
                }

                if ($counter > 0) {
                    return redirect()->back()
                        ->with('error', 'Une erreur est survenue lors de la prise de rendez-vous, la date selectionee est occupee . Veuillez réessayer.')
                        ->withInput();
                } else {
                    // dd($appointment);
                    $appointment->save();
                    // $patient->notify(new AppointmentConfirmation($appointment));
                    DB::commit();

                    return redirect()->route('profilePatient')
                        ->with('success', 'Votre rendez-vous a été confirmé avec succès!,vérifier votre liste des rendez vous');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()
                    ->with('error', $e->getMessage())
                    ->withInput();
            }
        } catch (\Exception $e) {
            // Log::error('Erreur lors du traitement du rendez-vous: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue. Veuillez réessayer.')
                ->withInput();
        }
    }

    public function index()
    {
        // dd('aa');
        $appointements = Appointment::with(['dentist.user', 'patient.user'])->get();
        // dd($appointements);
        return view('admin.rendez_vous', compact('appointements'));
    }
}
