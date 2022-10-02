<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HorarioController;
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

Route::resource('cliente', ClienteController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('horario', HorarioController::class);
Route::resource('cargo', CargoController::class);
Route::resource('contrato', ContratoController::class);
// Route para contratar Empleados
Route::get('contratar/{empleado:id}', [ContratoController::class, 'contratar'])->name('contrato.register');

require __DIR__.'/auth.php';