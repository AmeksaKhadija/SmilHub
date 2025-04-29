<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $patients = Patient::all();
        $patients = Patient::with(['user', 'appointments.dentist.user'])->get();

        foreach ($patients as $key => $patient) {

            $patient->next_appointement = $patient->appointments()
                ->where('date', '>=', Carbon::now()->toDateString())
                ->orderBy('date', 'desc')
                ->take(1)
                ->first();
        }

        return view('./admin/patients', compact('patients'));
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
     * @param  \App\Http\Requests\StorePatientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientsRequest  $request
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientsRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
