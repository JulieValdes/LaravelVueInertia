<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\ServicioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1.0')->group(function () {
    /*------------------Rutas Personas ---------------- */
    Route::get('personas', [PersonaController::class, 'index']);

    Route::post('personas', [PersonaController::class, 'create']);

    Route::get('personas/{id}', [PersonaController::class, 'show']);

    Route::put('personas/{id}', [PersonaController::class, 'update']);

    Route::delete('personas/{id}', [PersonaController::class, 'delete']);

    Route::get('personas/{id}', [PersonaController::class, 'restore']);

    /*------------------Rutas Servicios ---------------- */



});


