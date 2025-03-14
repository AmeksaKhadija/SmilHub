<?php

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
});

Route::get('/Login', function () {
    return view('Auth/Login');
});

Route::get('/Register', function () {
    return view('Auth/Register');
});

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
