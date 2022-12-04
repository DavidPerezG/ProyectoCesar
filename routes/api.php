<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\OficinasController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\VehiculosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/oficinas/{id}', [OficinasController::class, 'obtener']);
Route::get('/oficinas/', [OficinasController::class, 'obtenerTodos']);
Route::post('/oficinas', [OficinasController::class, 'crear']);
Route::put('/oficinas/{id}', [OficinasController::class, 'modificar']);
Route::delete('/oficinas/{id}', [OficinasController::class, 'eliminar']);

Route::get('/empleados/{id}', [EmpleadosController::class, 'obtener']);
Route::get('/empleados/', [EmpleadosController::class, 'obtenerTodos']);
Route::post('/empleados', [EmpleadosController::class, 'crear']);
Route::put('/empleados/{id}', [EmpleadosController::class, 'modificar']);
Route::delete('/empleados/{id}', [EmpleadosController::class, 'eliminar']);

Route::get('/vehiculos/{id}', [VehiculosController::class, 'obtener']);
Route::get('/vehiculos/', [VehiculosController::class, 'obtenerTodos']);
Route::post('/vehiculos', [VehiculosController::class, 'crear']);
Route::put('/vehiculos/{id}', [VehiculosController::class, 'modificar']);
Route::delete('/vehiculos/{id}', [VehiculosController::class, 'eliminar']);

Route::get('/reservas/{id}', [ReservasController::class, 'obtener']);
Route::get('/reservas/', [ReservasController::class, 'obtenerTodos']);
Route::post('/reservas', [ReservasController::class, 'crear']);
Route::put('/reservas/{id}', [ReservasController::class, 'modificar']);
Route::delete('/reservas/{id}', [ReservasController::class, 'eliminar']);
