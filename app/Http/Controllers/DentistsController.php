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


    public function getAppointementByDentist()
    {
        $user = Auth::user();
        // dd($user);
        $dentistId = $user->dentist->id;

        $appointements = Appointment::with(['dentist.user', 'patient.user'])
            ->where('dentist_id', $dentistId)
            ->get();

        return view('dentist.rendez_vous', compact('appointements'));
    }

    public function accepterAppointement($id)
    {
        $appointement = Appointment::findOrFail($id);

        if ($appointement->status == 'pending' || $appointement->status == 'cancelled') {
            $appointement->status = 'confirmed';
            $appointement->save();

            return redirect()->back()->with('success', 'Statut du rendez vous confirmée avec succès.');
        }

        return redirect()->back()->with('error', 'Le statut du rendez vous ne peut pas être mis à jour.');
    }

    public function annulerAppointement($id)
    {
        $appointement = Appointment::findOrFail($id);

        if ($appointement->status == 'pending' || $appointement->status == 'confirmed') {
            $appointement->status = 'cancelled';
            $appointement->save();

            return redirect()->back()->with('success', 'Rendez vous annulée avec succès.');
        }

        return redirect()->back()->with('error', 'Le statut du rendez vous ne peut pas être mis à jour.');
    }

    public function compliterAppointement($id)
    {
        $appointement = Appointment::findOrFail($id);

        if ($appointement->status == 'confirmed') {
            $appointement->status = 'completed';
            $appointement->save();

            return redirect()->back()->with('success', 'Rendez vous complitée avec succès.');
        }

        return redirect()->back()->with('error', 'Le statut du rendez vous ne peut pas être mis à jour.');
    }

    public function index()
    {
        $dentist = Auth::user()->dentist;

        if (!$dentist) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas un dentiste.');
        }

        $patientIds = Appointment::where('dentist_id', $dentist->id)
            ->pluck('patient_id');

        $patients = Patient::whereIn('id', $patientIds)
            ->with(['user', 'appointments'])
            ->get();



        return view('dentist.patients', compact('patients'));
    }

    public function allStatistics()
    {
        $userId = auth()->user()->dentist->id;
        $contents = Content::where('dentist_id', $userId)->count();
        $appointmentsCount = Appointment::where('dentist_id', $userId)->count();
        $appointementCompleted = Appointment::where('status', 'completed')->count();
        $appointementConfermed = Appointment::where('status', 'confirmed')->count();
        $appointementPending = Appointment::where('status', 'pending')->count();
        return view('dentist.statistics', compact(
            'contents',
            'appointmentsCount',
            'appointementCompleted',
            'appointementConfermed',
            'appointementPending'
        ));
    }
}
