<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/Register', [AuthController::class, 'register'])->name('register');
Route::post('/registerpost', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/Login', [AuthController::class, 'login'])->name('login');
Route::post('/loginpost', [AuthController::class, 'loginPost'])->name('loginpost');




Route::middleware(['auth'])->group(function () {
    // Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/profilePatient', [AuthController::class, 'profilePatient'])->name('profilePatient');
    Route::get('/profileDentiste', [AuthController::class, 'profileDentiste'])->name('profileDentiste');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    // Route::post('/profile/password', [AuthController::class, 'updatePassword'])->name('profile.password');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// middleware


// patient
Route::get('/prendre_rendez_vous', function () {
    return view('prendre_rendez_vous');
});

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
