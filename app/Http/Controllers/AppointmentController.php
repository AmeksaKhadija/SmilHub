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
        dd($validated);
        try {
            $dentist = Dentist::findOrFail($validated['dentist_id']);
            $patient = Auth::user();
            $appointmentDate = Carbon::parse($validated['date']);
            $appointmentTime = $validated['time'];

            $appointmentDateTime = Carbon::parse(
                $appointmentDate->format('Y-m-d') . ' ' . $appointmentTime
            );

            DB::beginTransaction();

            try {
                $appointment = new Appointment();
                $appointment->patient_id = $patient->id;
                $appointment->dentist_id = $dentist->id;
                $appointment->date = $appointmentDateTime;
                $appointment->status = 'En attente';
                $appointment->save();

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
