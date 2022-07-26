<?php

use App\Http\Controllers\AgreementController;
use App\Http\Controllers\AgreementTypeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\ScopeController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SectorTypeController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\SysadIndicatorController;
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
/*                               Scope route                                  */
/* -------------------------------------------------------------------------- */
Route::get('alcance', [ScopeController::class, 'index'])->name('alcance.index')->middleware('auth');
Route::get('alcance/crear', [ScopeController::class, 'create'])->name('alcance.create')->middleware('auth');
Route::post('alcance/store', [ScopeController::class, 'store'])->name('alcance.store')->middleware('auth');
Route::get('alcance/editar/{id}', [ScopeController::class, 'edit'])->name('alcance.edit')->middleware('auth');
Route::put('alcance/actualizar/{id}', [ScopeController::class, 'update'])->name('alcance.update')->middleware('auth');
Route::delete('alcance/eliminar/{id}', [ScopeController::class, 'destroy'])->name('alcance.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               Sector type route                            */
/* -------------------------------------------------------------------------- */
Route::get('tipo-sector', [SectorTypeController::class, 'index'])->name('tipo-sector.index')->middleware('auth');
Route::get('tipo-sector/crear', [SectorTypeController::class, 'create'])->name('tipo-sector.create')->middleware('auth');
Route::post('tipo-sector/store', [SectorTypeController::class, 'store'])->name('tipo-sector.store')->middleware('auth');
Route::get('tipo-sector/editar/{id}', [SectorTypeController::class, 'edit'])->name('tipo-sector.edit')->middleware('auth');
Route::put('tipo-sector/actualizar/{id}', [SectorTypeController::class, 'update'])->name('tipo-sector.update')->middleware('auth');
Route::delete('tipo-sector/eliminar/{id}', [SectorTypeController::class, 'destroy'])->name('tipo-sector.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               Sector route                                 */
/* -------------------------------------------------------------------------- */
Route::get('sector', [SectorController::class, 'index'])->name('sector.index')->middleware('auth');
Route::get('sector/crear', [SectorController::class, 'create'])->name('sector.create')->middleware('auth');
Route::post('sector/store', [SectorController::class, 'store'])->name('sector.store')->middleware('auth');
Route::get('sector/editar/{id}', [SectorController::class, 'edit'])->name('sector.edit')->middleware('auth');
Route::put('sector/actualizar/{id}', [SectorController::class, 'update'])->name('sector.update')->middleware('auth');
Route::delete('sector/eliminar/{id}', [SectorController::class, 'destroy'])->name('sector.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               Size route                                   */
/* -------------------------------------------------------------------------- */
Route::get('tamaño', [SizeController::class, 'index'])->name('tamanio.index')->middleware('auth');
Route::get('tamaño/crear', [SizeController::class, 'create'])->name('tamanio.create')->middleware('auth');
Route::post('tamaño/store', [SizeController::class, 'store'])->name('tamanio.store')->middleware('auth');
Route::get('tamaño/editar/{id}', [SizeController::class, 'edit'])->name('tamanio.edit')->middleware('auth');
Route::put('tamaño/actualizar/{id}', [SizeController::class, 'update'])->name('tamanio.update')->middleware('auth');
Route::delete('tamaño/eliminar/{id}', [SizeController::class, 'destroy'])->name('tamanio.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               Instance route                               */
/* -------------------------------------------------------------------------- */
Route::get('instancia', [InstanceController::class, 'index'])->name('instancia.index')->middleware('auth');
Route::get('instancia/crear', [InstanceController::class, 'create'])->name('instancia.create')->middleware('auth');
Route::post('instancia/store', [InstanceController::class, 'store'])->name('instancia.store')->middleware('auth');
Route::get('instancia/editar/{id}', [InstanceController::class, 'edit'])->name('instancia.edit')->middleware('auth');
Route::get('instancia/convenio/{id}', [InstanceController::class, 'show'])->name('instancia.show')->middleware('auth');
Route::put('instancia/actualizar/{id}', [InstanceController::class, 'update'])->name('instancia.update')->middleware('auth');
Route::delete('instancia/eliminar/{id}', [InstanceController::class, 'destroy'])->name('instancia.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               Agreement type route                         */
/* -------------------------------------------------------------------------- */
Route::get('tipo-convenio', [AgreementTypeController::class, 'index'])->name('tipo-convenio.index')->middleware('auth');
Route::get('tipo-convenio/crear', [AgreementTypeController::class, 'create'])->name('tipo-convenio.create')->middleware('auth');
Route::post('tipo-convenio/store', [AgreementTypeController::class, 'store'])->name('tipo-convenio.store')->middleware('auth');
Route::get('tipo-convenio/editar/{id}', [AgreementTypeController::class, 'edit'])->name('tipo-convenio.edit')->middleware('auth');
Route::put('tipo-convenio/actualizar/{id}', [AgreementTypeController::class, 'update'])->name('tipo-convenio.update')->middleware('auth');
Route::delete('tipo-convenio/eliminar/{id}', [AgreementTypeController::class, 'destroy'])->name('tipo-convenio.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               Indicator route                              */
/* -------------------------------------------------------------------------- */
Route::get('indicador', [IndicatorController::class, 'index'])->name('indicador.index')->middleware('auth');
Route::get('indicador/crear', [IndicatorController::class, 'create'])->name('indicador.create')->middleware('auth');
Route::post('indicador/store', [IndicatorController::class, 'store'])->name('indicador.store')->middleware('auth');
Route::get('indicador/editar/{id}', [IndicatorController::class, 'edit'])->name('indicador.edit')->middleware('auth');
Route::put('indicador/actualizar/{id}', [IndicatorController::class, 'update'])->name('indicador.update')->middleware('auth');
Route::delete('indicador/eliminar/{id}', [IndicatorController::class, 'destroy'])->name('indicador.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                              Sysad Indicator route                         */
/* -------------------------------------------------------------------------- */
Route::get('indicador-sysad', [SysadIndicatorController::class, 'index'])->name('indicador-sysad.index')->middleware('auth');
Route::get('indicador-sysad/crear', [SysadIndicatorController::class, 'create'])->name('indicador-sysad.create')->middleware('auth');
Route::post('indicador-sysad/store', [SysadIndicatorController::class, 'store'])->name('indicador-sysad.store')->middleware('auth');
Route::get('indicador-sysad/editar/{id}', [SysadIndicatorController::class, 'edit'])->name('indicador-sysad.edit')->middleware('auth');
Route::put('indicador-sysad/actualizar/{id}', [SysadIndicatorController::class, 'update'])->name('indicador-sysad.update')->middleware('auth');
Route::delete('indicador-sysad/eliminar/{id}', [SysadIndicatorController::class, 'destroy'])->name('indicador-sysad.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                              Specialty route                               */
/* -------------------------------------------------------------------------- */
Route::get('carrera', [SpecialtyController::class, 'index'])->name('carrera.index')->middleware('auth');
Route::get('carrera/crear', [SpecialtyController::class, 'create'])->name('carrera.create')->middleware('auth');
Route::post('carrera/store', [SpecialtyController::class, 'store'])->name('carrera.store')->middleware('auth');
Route::get('carrera/editar/{id}', [SpecialtyController::class, 'edit'])->name('carrera.edit')->middleware('auth');
Route::put('carrera/actualizar/{id}', [SpecialtyController::class, 'update'])->name('carrera.update')->middleware('auth');
Route::delete('carrera/eliminar/{id}', [SpecialtyController::class, 'destroy'])->name('carrera.destroy')->middleware('auth');
/* -------------------------------------------------------------------------- */
/*                               Agreement route                              */
/* -------------------------------------------------------------------------- */
Route::get('convenio', [AgreementController::class, 'index'])->name('convenio.index')->middleware('auth');
Route::get('convenio/crear', [AgreementController::class, 'create'])->name('convenio.create')->middleware('auth');
Route::post('convenio/store', [AgreementController::class, 'store'])->name('convenio.store')->middleware('auth');
Route::get('convenio/editar/{id}', [AgreementController::class, 'edit'])->name('convenio.edit')->middleware('auth');
Route::put('convenio/actualizar/{id}', [AgreementController::class, 'update'])->name('convenio.update')->middleware('auth');
Route::delete('convenio/eliminar/{id}', [AgreementController::class, 'destroy'])->name('convenio.destroy')->middleware('auth');
Route::get('convenios/vigentes', [AgreementController::class, 'currentAgreements'])->name('convenio.vigentes')->middleware('auth');
Route::get('convenios/vigentes-marco', [AgreementController::class, 'currentMarcoAgreements'])->name('convenio.vigentes.marco')->middleware('auth');
Route::get('convenios/finalizados', [AgreementController::class, 'finalizedAgreements'])->name('convenio.finalizados')->middleware('auth');
Route::get('convenios/cancelados', [AgreementController::class, 'canceledAgreements'])->name('convenio.concluidos')->middleware('auth');
Route::get('convenios/indicadores', [AgreementController::class, 'sysadIndicatorAgreements'])->name('convenio.indicador')->middleware('auth');
Route::get('convenios/vigentes-por-fecha', [AgreementController::class, 'getCurrentAgreementsByDate'])->name('agreement.by.date')->middleware('auth');
Route::get('convenios/por-carrera/{idSpecialty}', [AgreementController::class, 'getAgreementsBySpecialties'])->name('agreement.by.specialty')->middleware('auth');
