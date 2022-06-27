<?php

use App\Http\Controllers\AgreementTypeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\ClassificationController;
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
/* -------------------------------------------------------------------------- */
/*                                 Area route                                 */
/* -------------------------------------------------------------------------- */
Route::get('area-conocimiento', [AreaController::class, 'index'])->name('area.index')->middleware('auth');
Route::get('area-conocimiento/crear', [AreaController::class, 'create'])->name('area.create')->middleware('auth');
Route::post('area-conocimiento/store', [AreaController::class, 'store'])->name('area.store')->middleware('auth');
Route::get('area-conocimiento/editar/{id}', [AreaController::class, 'edit'])->name('area.edit')->middleware('auth');
Route::put('area-conocimiento/actualizar/{id}', [AreaController::class, 'update'])->name('area.update')->middleware('auth');
Route::delete('area-conocimiento/eliminar/{id}', [AreaController::class, 'destroy'])->name('area.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                            Classification route                            */
/* -------------------------------------------------------------------------- */
Route::get('giro', [ClassificationController::class, 'index'])->name('giro.index')->middleware('auth');
Route::get('giro/crear', [ClassificationController::class, 'create'])->name('giro.create')->middleware('auth');
Route::post('giro/store', [ClassificationController::class, 'store'])->name('giro.store')->middleware('auth');
Route::get('giro/editar/{id}', [ClassificationController::class, 'edit'])->name('giro.edit')->middleware('auth');
Route::put('giro/actualizar/{id}', [ClassificationController::class, 'update'])->name('giro.update')->middleware('auth');
Route::delete('giro/eliminar/{id}', [ClassificationController::class, 'destroy'])->name('giro.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               Indicator route                              */
/* -------------------------------------------------------------------------- */
Route::get('indicador', [IndicatorController::class, 'index'])->name('indicador.index')->middleware('auth');
Route::get('indicador/crear', [IndicatorController::class, 'create'])->name('indicador.create')->middleware('auth');
Route::post('indicador/store', [IndicatorController::class, 'store'])->name('indicador.store')->middleware('auth');
Route::get('indicador/editar/{id}', [IndicatorController::class, 'edit'])->name('indicador.edit')->middleware('auth');
Route::put('indicador/actualizar/{id}', [IndicatorController::class, 'update'])->name('indicador.update')->middleware('auth');
Route::delete('indicador/eliminar/{id}', [IndicatorController::class, 'destroy'])->name('indicador.destroy')->middleware('auth');
