<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DentistsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [DentistsController::class, 'getAllDentist']);


Route::get('/Register', [AuthController::class, 'register'])->name('register');
Route::post('/registerpost', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/Login', [AuthController::class, 'login'])->name('login');
Route::post('/loginpost', [AuthController::class, 'loginPost'])->name('loginpost');




Route::middleware(['auth'])->group(function () {
    // Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/profilePatient', [AuthController::class, 'profilePatient'])->name('profilePatient');
    Route::get('/profileDentiste', [AuthController::class, 'profileDentiste'])->name('profileDentiste');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::get('/prendre_rendez_vous', [DentistsController::class, 'index'])->name('getAllDentistes');
    Route::post('/prendre_rendez_vous', [AppointmentController::class, 'store'])->name('appointments.store');

    
    Route::get('/logout', [AuthController::class, 'logout']);
});


// middleware


// patient

Route::get('/suivi_soin', function () {
    return view('suivi_soin');
});

// dentiste
Route::get('/dentistDashboard', function () {
    return view('dentistDashboard');
});

// admin
Route::get('/adminDashboard', function () {
    return view('adminDashboard');
});
