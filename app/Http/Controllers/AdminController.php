<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Appointment;
use App\Models\Dentist;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function activateDentist(Request $request, $id)
    {
        $dentist = Dentist::findOrFail($id);

        if ($dentist->user->status === 'pending') {
            $dentist->user->status = 'active';
            $dentist->user->save();

            return redirect()->back()->with('success', 'Statut du dentiste mis à jour avec succès.');
        }

        return redirect()->back()->with('error', 'Le statut du dentiste ne peut pas être mis à jour.');
    }

    public function inactivatUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->status !== 'inactive') {
            $user->status = 'inactive';
            $user->save();
            return redirect()->back()->with('success', 'Statut d utilisateur mis à jour avec succès.');
        }
        return redirect()->back()->with('error', 'Le statut du dentiste ne peut pas être mis à jour.');
    }

    public function activatUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->status !== 'active') {
            $user->status = 'active';
            $user->save();
            return redirect()->back()->with('success', 'Statut d utilisateur mis à jour avec succès.');
        }
        return redirect()->back()->with('error', 'Le statut du dentiste ne peut pas être mis à jour.');
    }

    public function statisticsDashboard()
    {
        $userCount = User::count();
        $dentistsActifs = User::where('role', 'dentiste')->where('status', 'active')->count();
        $dentistsInactifs = User::where('role', 'dentiste')->where('status', 'inactive')->count();
        $patientsCount = User::where('role', 'patient')->count();
        $appointmentsCount = Appointment::count();
        $users = User::all();
        $dentists = Dentist::all();
        foreach ($dentists as $dentist) {
            $dentist->available_slots = json_decode($dentist->available_slots, true);
        }

        return view('admin.statistics', compact(
            'userCount',
            'dentistsActifs',
            'dentistsInactifs',
            'patientsCount',
            'appointmentsCount',
            'dentists',
            'users'
        ));
    }
}
