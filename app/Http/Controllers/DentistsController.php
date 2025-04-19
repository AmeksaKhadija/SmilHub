<?php

namespace App\Http\Controllers;

use App\Models\Dentists;
use App\Http\Requests\StoreDentistsRequest;
use App\Http\Requests\UpdateDentistsRequest;
use App\Models\Dentist;

class DentistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dentists = Dentist::all();

        foreach ($dentists as $dentist) {
            $dentist->available_slots = json_decode($dentist->available_slots, true);
        }

        return view('/prendre_rendez_vous', compact('dentists'));
    }

    public function getAllDentist()
    {
        $dentists = Dentist::all();

        foreach ($dentists as $dentist) {
            $dentist->available_slots = json_decode($dentist->available_slots, true);
        }
        return view('/index', ['dentists' => $dentists]);
    }
    /**
     * Show the form for creating a new resource.
     *x
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDentistsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDentistsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dentists  $dentists
     * @return \Illuminate\Http\Response
     */
    public function show(Dentist $dentist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dentists  $dentists
     * @return \Illuminate\Http\Response
     */
    public function edit(Dentist $dentist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDentistsRequest  $request
     * @param  \App\Models\Dentists  $dentists
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDentistsRequest $request, Dentist $dentist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dentists  $dentists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dentist $dentist)
    {
        //
    }
}
