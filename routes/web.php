<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContentController;
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


Route::get('/', [DentistsController::class, 'getAllDentist'])->name('home');
Route::get('/dentists/{dentist}', [DentistsController::class, 'show'])->name('dentists.show');


Route::get('/Register', [AuthController::class, 'register'])->name('register');
Route::post('/registerpost', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/Login', [AuthController::class, 'login'])->name('login');
Route::post('/loginpost', [AuthController::class, 'loginPost'])->name('loginpost');



// Route::middleware(['auth'])->group(function () {
Route::get('/profilePatient', [AuthController::class, 'profilePatient'])->name('profilePatient');
Route::get('/profileDentiste', [AuthController::class, 'profileDentiste'])->name('profileDentiste');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::get('/prendre_rendez_vous', [DentistsController::class, 'index'])->name('getAllDentistes');
Route::post('/prendre_rendez_vous', [AppointmentController::class, 'store'])->name('appointments.store');



Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
Route::get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
Route::get('/contents/{content}', [ContentController::class, 'show'])->name('contents.show');
Route::get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');
Route::put('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');

// API routes for content
Route::get('/api/contents/dentist/{dentistId}', [ContentController::class, 'getByDentist'])->name('api.contents.by.dentist');
Route::get('/api/contents/category/{categoryId}', [ContentController::class, 'getByCategory'])->name('api.contents.by.category');

// Category routes
Route::get('/contents/dentist/{dentistId}', [ContentController::class, 'getByDentist'])->name('contents.by.dentist');
Route::get('/contents/category/{categoryId}', [ContentController::class, 'getByCategory'])->name('contents.by.category');


Route::resource('categories', CategorieController::class);
Route::get('/all-categories', [CategorieController::class, 'getAllCategories'])->name('categories.all');

Route::get('/logout', [AuthController::class, 'logout']);
// });


// middleware

Route::get('/detailDentist', function () {
    return view('detailDentist');
});
// patient

Route::get('/suivi_soin', function () {
    return view('suivi_soin');
});

// dentiste
Route::get('/dentistDashboard', function () {
    return view('./dentist/dentistDashboard');
})->name('dentistDashboard');

// admin
Route::get('/adminDashboard', function () {
    return view('adminDashboard');
});
