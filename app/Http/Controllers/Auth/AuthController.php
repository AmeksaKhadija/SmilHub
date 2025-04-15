<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $user->status = $request->role == 'patient' ? 'active' : 'pending';
        $user->save();
        // dd($user);

        if ($request->role == 'patient') {
            $patient = new Patient();
            $patient->utilisateur_id = $user->id;
            $patient->medical_history = json_encode([]);
            $patient->status = 'active';
            $patient->save();
        } elseif ($request->role == 'dentiste') {
            $dentist = new Dentist();
            $dentist->utilisateur_id = $user->id;
            $dentist->speciality = null;
            $dentist->available_slots = json_encode([]);
            $dentist->status = 'pending';
            $dentist->save();
        }


        if ($request->role == 'dentiste') {
            return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Veuillez attendre l\'approbation de l\'administrateur avant de pouvoir vous connecter.');
        } else {
            return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter pour prendre rendez-vous.');
        }
    }

    public function login()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }

        return view('Auth/Login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Aucun compte trouvé avec cette adresse email.',
            ])->withInput($request->except('password'));
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Mot de passe incorrect.',
            ])->withInput($request->except('password'));
        }

        if ($user->status === 'pending' && $user->role === 'dentiste') {
            return back()->withErrors([
                'email' => 'Votre compte dentiste est en attente d\'approbation par l\'administrateur.',
            ])->withInput($request->except('password'));
        } elseif ($user->status !== 'active') {
            return back()->withErrors([
                'email' => 'Votre compte a été bloqué. Veuillez contacter l\'administrateur.',
            ])->withInput($request->except('password'));
        }

        Auth::login($user);

        $request->session()->regenerate();

        return $this->redirectBasedOnRole($user);
    }

    // public function profile()
    // {
    //     $user = Auth::user();

    //     if (!$user) {
    //         return redirect()->route('login')->with('info', 'Veuillez vous connecter pour accéder à votre profil.');
    //     }

    //     if ($user->role === 'patient') {
    //         $patient = $user->patient;
    //         return view('profilePatient', compact('user', 'patient'));
    //     } elseif ($user->role === 'dentiste') {
    //         $dentist = $user->dentist;
    //         return view('profileDentiste', compact('user', 'dentist'));
    //     } else {
    //         return redirect()->route('/')->with('error', 'Accès non autorisé.');
    //     }
    // }

    public function profilePatient()
    {
        $user = Auth::user();
        if ($user->role !== 'patient') {
            return redirect('/')->with('error', 'Accès non autorisé.');
        }

        $patient = $user->patient;
        return view('profilePatient', compact('user', 'patient'));
    }

    public function profileDentiste()
    {
        $user = Auth::user();
        if ($user->role !== 'dentiste') {
            return redirect('/')->with('error', 'Accès non autorisé.');
        }

        $dentist = $user->dentist;
        return view('profileDentiste', compact('user', 'dentist'));
    }



    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $section = $request->input('section', 'personal');

        if ($section === 'personal') {
            $request->validate([
                'nom' => 'required|string|min:2|max:30',
                'prenom' => 'required|string|min:2|max:30',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'required|string',
            ]);

            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->phone = $request->phone;

            $user->save();
        } elseif ($section === 'speciality' && $user->role === 'dentiste') {

            $dentist = Dentist::where('utilisateur_id', $user->id)->first();
            if (!$dentist) {
                $dentist = new Dentist();
                $dentist->utilisateur_id = $user->id;
            }

            if ($request->has('speciality')) {
                $dentist->speciality = $request->speciality;
            }

            $dentist->save();
        } elseif ($section === 'availability' && $user->role === 'dentiste') {
            $dentist = Dentist::where('utilisateur_id', $user->id)->first();

            if (!$dentist) {
                $dentist = new Dentist();
                $dentist->utilisateur_id = $user->id;
            }

            if ($request->has('available_slots')) {
                $dentist->available_slots = json_encode($request->available_slots);
            }
            $dentist->save();

            // patient 
        } elseif ($section === 'medical' && $user->role === 'patient') {
            $patient = Patient::where('utilisateur_id', $user->id)->first();
            if (!$patient) {
                $patient = new Patient();
                $patient->utilisateur_id = $user->id;
            }

            if ($request->has('medical_history')) {
                $patient->medical_history = json_encode($request->medical_history);
            }

            $patient->save();
        }

        return redirect()->back()->with('success', 'Votre profil a été mis à jour avec succès.');
    }


    private function redirectBasedOnRole(User $user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect('/adminDashboard');
            case 'dentiste':
                return redirect('/profileDentiste');
            case 'patient':
                return redirect('/profilePatient');
            default:
                return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
