<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DentistsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\TreatmentController;
use App\Models\Treatment;
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


Route::get('/', [DentistsController::class, 'getAllDentistInHomePage'])->name('home');
Route::get('/dentists/{dentist}', [DentistsController::class, 'show'])->name('dentists.show');


Route::get('/Register', [AuthController::class, 'register'])->name('register');
Route::post('/registerpost', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('/Login', [AuthController::class, 'login'])->name('login');
Route::post('/loginpost', [AuthController::class, 'loginPost'])->name('loginpost');



// profile 
Route::get('/profilePatient', [AuthController::class, 'profilePatient'])->name('profilePatient');
Route::get('/profileDentiste', [AuthController::class, 'profileDentiste'])->name('profileDentiste');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::get('/prendre_rendez_vous', [DentistsController::class, 'getDentisteToTakeAppointement'])->name('getAllDentistes');
Route::post('/prendre_rendez_vous', [AppointmentController::class, 'store'])->name('appointments.store');


// dentist 
Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
Route::get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
Route::get('/contents/{content}', [ContentController::class, 'show'])->name('contents.show');
Route::get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');
Route::put('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');
Route::get('/contents/dentist/{dentistId}', [ContentController::class, 'getByDentist'])->name('contents.by.dentist');
Route::get('/contents/category/{categoryId}', [ContentController::class, 'getByCategory'])->name('contents.by.category');


// admin
Route::get('/categoriess', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categorie.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
Route::get('/all-categories', [CategorieController::class, 'getAllCategories'])->name('categories.all');


Route::patch('/admin/dentists/{id}/activate', [AdminController::class, 'activateDentist'])->name('admin.dentists');
Route::patch('/admin/user/{id}/inactive', [AdminController::class, 'inactivatUser'])->name('admin.Statistics.desactive');
Route::patch('/admin/user/{id}/active', [AdminController::class, 'activatUser'])->name('admin.Statistics.active');

Route::get('/dentists', [DentistsController::class, 'getDentistInAdminDashboard'])->name('dentists.index');
Route::get('/patients', [PatientsController::class, 'index'])->name('patients.index');

Route::get('/rendez_vous', [AppointmentController::class, 'index'])->name('rendez_vous.index');
Route::get('/statistics', [AdminController::class, 'statisticsDashboard'])->name('statistics.dashboard');
Route::get('/admin/dentists/{dentist}/details', [DentistsController::class, 'getDetails'])->name('dentists.details');


// dentist
// dentiste
Route::get('/mesRendezVous', [DentistsController::class, 'getAppointementByDentist'])->name('mesRendezVous.index');
Route::patch('/dentist/appointement/{id}/accepter', [DentistsController::class, 'accepterAppointement'])->name('dentist.appointement.accepter');
Route::patch('/dentist/appointement/{id}/annuler', [DentistsController::class, 'annulerAppointement'])->name('dentist.appointement.annuler');
Route::patch('/dentist/appointement/{id}/compliter', [DentistsController::class, 'compliterAppointement'])->name('dentist.appointement.compliter');
Route::get('/mesPatients', [DentistsController::class, 'index'])->name('mesPatients.index');
Route::post('appointment/addTreatment', [TreatmentController::class, 'store'])->name('dentist.appointement.addTraitement');
Route::get('treatment', [TreatmentController::class, 'index'])->name('treatment.index');
Route::get('/treatment/{treatment}/edit', [TreatmentController::class, 'edit'])->name('treatment.edit');
Route::put('/treatment/{treatment}', [TreatmentController::class, 'update'])->name('treatment.update');
Route::delete('/treatment/{treatment}', [TreatmentController::class, 'destroy'])->name('treatment.destroy');
Route::get('/allStatistics', [DentistsController::class, 'allStatistics'])->name('statistics.all');


Route::get('/logout', [AuthController::class, 'logout']);
// });
