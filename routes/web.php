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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\ApplicantController::class, 'index'])->name('index');

Route::get('/applicants/{id}/edit', [\App\Http\Controllers\ApplicantController::class, 'edit'])->name('applicants.edit');

Route::put('/applicants/{id}/update', [\App\Http\Controllers\ApplicantController::class, 'update'])->name('applicants.update');

Route::delete('/applicants/{id}/delete', [\App\Http\Controllers\ApplicantController::class, 'delete'])->name('applicants.delete');

Route::put('/applicants/{id}/hire', [\App\Http\Controllers\ApplicantController::class, 'hire'])->name('applicants.hire');
