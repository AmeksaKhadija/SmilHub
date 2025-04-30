<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Http\Requests\StoreTreatmentRequest;
use App\Http\Requests\UpdateTreatmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        $dentistId = $user->dentist->id;

        $appointements = Appointment::with(['dentist.user', 'patient.user', 'treatment'])
            ->where('dentist_id', $dentistId)
            ->get();
        $treatments = $appointements->pluck('treatment')->filter();
        return view('dentist.treatment', compact('appointements', 'treatments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // dd($id);
        $treatments = Treatment::all();
        return view('dentist.treatments.create', compact('treatments', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTreatmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $appointment_id = $request->input('id');

        // dd($appointment_id); 

        $request->validate([
            'description' => 'required|string|max:255',
            'medications' => 'required|string|max:255',
        ]);

        $appointment = Appointment::findOrFail($appointment_id);
        // dd($appointment->treatment->count());
        if ($appointment->treatment->count() > 0) {

            return redirect()->back()->with('error', 'appointement has already treatment');
        } else {

            $treatment = new Treatment();
            $treatment->appointment_id = $appointment->id;
            $treatment->description = $request->input('description');
            $treatment->medications = $request->input('medications');
            $treatment->save();

            return redirect()->route('mesRendezVous.index')
                ->with('success', 'Traitement ajouté avec succès');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatment $treatment)
    {
        return view('dentist.treatments.edit', compact('treatment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTreatmentRequest  $request
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Treatment $treatment)
    {
        $validator = $request->validate([
            'description' => 'required|string|max:255',
            'medications' => 'required|string|max:255',
        ]);

        if (!$validator) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $treatment->update([
            'description' => $request->description,
            'medications' => $request->medications,
        ]);

        return redirect()->route('treatment.index')
            ->with('success', 'Treatment mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        // $treatment = Treatment::findOrFail($treatment);

        $treatment->delete();

        return redirect()->back()
            ->with('success', 'Le traitement a été supprimé avec succès');
    }
}
