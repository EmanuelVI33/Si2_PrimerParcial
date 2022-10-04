<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FumigacionController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ServicioController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('contrato', ContratoController::class)->only('index', 'edit', 'show','update', 'destroy', 'store');
Route::get('contrato/create/{empleado:id}', [ContratoController::class, 'create'])->name('contrato.create');

Route::resource('cliente', ClienteController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('horario', HorarioController::class);
Route::resource('cargo', CargoController::class);
Route::resource('fumi', FumigacionController::class);

Route::resource('servicio',ServicioController::class);
Route::get('servicio/create/{cliente:id}', [ServicioController::class, 'create'])->name('servicio.solicitar');
Route::get('servicio/espera/', [ServicioController::class, 'espera'])->name('servicio.espera');
Route::get('servicio/aceptar/{servicio_id}', [ServicioController::class, 'aceptar'])->name('servicio.aceptar');
Route::post('servicio/aceptar/{servicio_id}', [ServicioController::class, 'aceptarStore'])->name('servicio.aceptarStore');

require __DIR__.'/auth.php';