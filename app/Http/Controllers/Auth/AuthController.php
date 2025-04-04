<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('Auth/Register');
    }

    public function registerPost(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nom' => 'required|string|min:2|max:30',
            'prenom' => 'required|string|min:2|max:30',
            'email' => 'required|email|unique:users,email',
            'tele' => 'required|string',
            'password' => 'required|min:8',
            'role' => 'required|in:patient,dentiste',
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->tele;
        $user->role = $request->role;

        if ($request->role == 'dentiste') {
            $user->status = 'pending';
        } else {
            $user->status = 'active';
        }

        $user->save();

        if ($request->role == 'dentiste') {
            return redirect('/')->with('success', 'Votre compte a été créé avec succès. Veuillez attendre l\'approbation de l\'administrateur avant de pouvoir vous connecter.');
        } else {
            return redirect('/prendre_rendez_vous')->with('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant prendre rendez-vous.');
        }
    }
}
