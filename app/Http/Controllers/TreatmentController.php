<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Http\Requests\StoreTreatmentRequest;
use App\Http\Requests\UpdateTreatmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $appointment_id = $request->input('appointment_id');

        // dd($appointment_id); 

        $request->validate([
            'description' => 'required|string|max:255',
            'medications' => 'required|string|max:255',
        ]);

        $appointment = Appointment::findOrFail($appointment_id);

        $treatment = new Treatment();
        $treatment->appointment_id = $appointment->id;
        $treatment->description = $request->input('description');
        $treatment->medications = $request->input('medications');
        $treatment->save();

        return redirect()->back()->with('success', 'Traitement ajouté avec succès');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTreatmentRequest  $request
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTreatmentRequest $request, Treatment $treatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        //
    }
}
