<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\TransaccionController;
use \App\Http\Controllers\CuentasController;

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

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');


    Route::prefix('cuentas')->group(function () {
        Route::view('crear', 'cuentas.crear')->name('cuentas.crear');
        Route::post('store', [CuentasController::class, 'store'])->name('cuentas.store');
        Route::view('inscribir', 'cuentas.inscribir')->name('cuentas.inscribir');
        Route::post('guardarinscripcion', [CuentasController::class, 'guardarinscripcion'])->name('cuentas.guardarinscripcion');
        Route::get('estado', [CuentasController::class, 'estado'])->name('cuentas.estado');
        Route::put('activar/{id}',[CuentasController::class,'activar'])->name('cuentas.activar');
        Route::put('inactivar/{id}',[CuentasController::class,'inactivar'])->name('cuentas.inactivar');
    });

    Route::prefix('terceros')->group(function () {
        Route::put('activar/{id}',[CuentasController::class,'activarTerceros'])->name('terceros.activar');
        Route::put('inactivar/{id}',[CuentasController::class,'inactivarTerceros'])->name('terceros.inactivar');
    });

    Route::prefix('transacciones')->group(function () {
        Route::view('home', 'transacciones.home')->name('transacciones.home');
        Route::get('propias', [TransaccionController::class, 'nuevaTransferencia'])->name('transacciones.propias');
        Route::get('terceros', [TransaccionController::class, 'nuevaTransferenciaTerceros'])->name('transacciones.terceros');
        Route::post('transferir', [TransaccionController::class, 'transferir'])->name('transacciones.transferir');
        Route::get('datatable', [TransaccionController::class, 'datatable'])->name('transacciones.datatable');
    });

});


Route::prefix('auth')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});
