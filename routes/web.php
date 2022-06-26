<?php

use App\Http\Controllers\AgreementTypeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/* -------------------------------------------------------------------------- */
/*                               Agreement route                              */
/* -------------------------------------------------------------------------- */
Route::get('tipo-convenio', [AgreementTypeController::class, 'index'])->name('tipo-convenio.index')->middleware('auth');
Route::get('tipo-convenio/crear', [AgreementTypeController::class, 'create'])->name('tipo-convenio.create')->middleware('auth');
Route::post('tipo-convenio/store', [AgreementTypeController::class, 'store'])->name('tipo-convenio.store')->middleware('auth');
Route::get('tipo-convenio/editar/{id}', [AgreementTypeController::class, 'edit'])->name('tipo-convenio.edit')->middleware('auth');
Route::put('tipo-convenio/actualizar/{id}', [AgreementTypeController::class, 'update'])->name('tipo-convenio.update')->middleware('auth');
Route::delete('tipo-convenio/eliminar/{id}', [AgreementTypeController::class, 'destroy'])->name('tipo-convenio.destroy')->middleware('auth');



