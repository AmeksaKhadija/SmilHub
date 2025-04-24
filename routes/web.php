<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DentistsController;
use App\Http\Controllers\PatientsController;
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



// Route::middleware(['auth'])->group(function () {
Route::get('/profilePatient', [AuthController::class, 'profilePatient'])->name('profilePatient');
Route::get('/profileDentiste', [AuthController::class, 'profileDentiste'])->name('profileDentiste');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::get('/prendre_rendez_vous', [DentistsController::class, 'getDentisteToTakeAppointement'])->name('getAllDentistes');
Route::post('/prendre_rendez_vous', [AppointmentController::class, 'store'])->name('appointments.store');



Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
Route::get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
Route::get('/contents/{content}', [ContentController::class, 'show'])->name('contents.show');
Route::get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');
Route::put('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');

Route::get('/api/contents/dentist/{dentistId}', [ContentController::class, 'getByDentist'])->name('api.contents.by.dentist');
Route::get('/api/contents/category/{categoryId}', [ContentController::class, 'getByCategory'])->name('api.contents.by.category');

// Category routes
Route::get('/contents/dentist/{dentistId}', [ContentController::class, 'getByDentist'])->name('contents.by.dentist');
Route::get('/contents/category/{categoryId}', [ContentController::class, 'getByCategory'])->name('contents.by.category');


// Route::resource('categories', CategorieController::class);
Route::get('/categoriess', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categorie.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');




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
Route::get('/dashbord', function () {
    return view('./admin/dashbord');
})->name('dentist.dashbord');

// Route::get('/dentists', function () {
//     return view('./admin/dentists');
// })->name('dentists.index');
Route::patch('/admin/dentists/{id}/activate', [AdminController::class, 'activateDentist'])->name('admin.dentists');
Route::get('/dentists', [DentistsController::class, 'getDentistInAdminDashboard'])->name('dentists.index');
Route::get('/patients', [PatientsController::class, 'index'])->name('patients.index');


// Route::get('/patients', function () {
//     return view('./admin/patients');
// })->name('patients.index');
Route::get('/rendez_vous', function () {
    return view('./admin/rendez_vous');
})->name('rendez_vous.index');
Route::get('/statistics', function () {
    return view('./admin/statistcs');
})->name('statistics.index');
