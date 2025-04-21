<?php

namespace App\Http\Controllers;

use App\Models\Dentists;
use App\Http\Requests\StoreDentistsRequest;
use App\Http\Requests\UpdateDentistsRequest;
use App\Models\Categorie;
use App\Models\Content;
use App\Models\Dentist;
use Illuminate\Support\Facades\Auth;

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
    public function show($id)
    {
        $dentist = Dentist::with('user')->findOrFail($id);
        $contents = Content::where('dentist_id', $id)
            ->with('categorie')
            ->latest()
            ->get();
        $categories = Categorie::all();

        return view('detailDentist', compact('dentist', 'contents', 'categories'));
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



    public function profile()
    {
        // Récupérer le dentiste connecté
        $user = Auth::user();
        $dentist = Dentist::where('user_id', $user->id)->firstOrFail();

        $contents = Content::where('dentist_id', $dentist->id)
            ->with('categorie')
            ->latest()
            ->get();
        $categories = Categorie::all();

        return view('dentist-profile', compact('dentist', 'contents', 'categories'));
    }

    /**
     * Get dentist's contents
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getContents($id)
    {
        $dentist = Dentist::findOrFail($id);
        $contents = Content::where('dentist_id', $dentist)
            ->with('categorie')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $contents
        ]);
    }
}
