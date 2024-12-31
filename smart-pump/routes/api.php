<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StationController;
use App\Http\Controllers\CuveController;
use App\Http\Controllers\PompeController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BonDachatController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\MaintenanceController;

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

Route::apiResource('stations', StationController::class);
Route::apiResource('cuves', CuveController::class);
Route::apiResource('pompes', PompeController::class);
Route::apiResource('utilisateurs', UtilisateurController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('bons-dachat', BonDachatController::class);
Route::apiResource('ventes', VenteController::class);
Route::apiResource('depenses', DepenseController::class);
Route::apiResource('factures', FactureController::class);
Route::apiResource('maintenance', MaintenanceController::class);

