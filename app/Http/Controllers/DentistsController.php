<?php

namespace App\Http\Controllers;

use App\Models\Dentists;
use App\Http\Requests\StoreDentistsRequest;
use App\Http\Requests\UpdateDentistsRequest;
use App\Models\Appointment;
use App\Models\Categorie;
use App\Models\Content;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DentistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getAllDentistsAndReturn($viewName)
    {
        $dentists = Dentist::all();

        foreach ($dentists as $dentist) {
            $dentist->available_slots = json_decode($dentist->available_slots, true);
        }
        return view($viewName, compact('dentists'));
    }

    public function getDentisteToTakeAppointement()
    {
        return $this->getAllDentistsAndReturn('patient.prendre_rendez_vous');
    }


    public function getAllDentistInHomePage()
    {
        return $this->getAllDentistsAndReturn('/index');
    }

    public function getDentistInAdminDashboard()
    {
        return $this->getAllDentistsAndReturn('./admin/dentists');
    }

    // public function getDentistInStatistics()
    // {
    //     return $this->getAllDentistsAndReturn('admin.statistics');
    // }


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

        return view('client.detailDentist', compact('dentist', 'contents', 'categories'));
    }

    

    public function getDetails($id)
    {
        $dentist = Dentist::with('user')->findOrFail($id);
        $contents = Content::where('dentist_id', $id)
            ->with('categorie')
            ->latest()
            ->get();

        return response()->json([
            'dentist' => $dentist,
            'contents' => $contents
        ]);
    }
}
