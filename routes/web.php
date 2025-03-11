<?php

use Illuminate\Support\Facades\Route;
Use App\Http\controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\CuveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/Dashboard', function () {
        return view('Dashboard.index'); // Page après connexion
    })->name('Dashboard');

    Route::resource('users', UserController::class);
    Route::get('/Dashboard',[DashboardController::class,'Dashboard'])->name('Dashboard.index');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Auth::routes(['reset' => true]);

Route::resource('clients', ClientController::class);


use App\Http\Controllers\BonDachatController;

Route::resource('bons', BonDachatController::class);

use App\Http\Controllers\FactureController;

// Route::resource('factures', FactureController::class);
Route::get('factures/generate', [FactureController::class, 'showGenerateForm'])->name('factures.showGenerateForm');
Route::post('factures/generate', [FactureController::class, 'generate'])->name('factures.generate');
Route::get('factures/{id}/pdf', [FactureController::class, 'generatePDF'])->name('factures.pdf');

Route::get('factures/{id}/preview', [FactureController::class, 'preview'])->name('factures.preview');
Route::get('factures/{id}/pdf', [FactureController::class, 'generatePDF'])->name('factures.downloadPDF');


Route::get('bons/{id}', [BonDachatController::class, 'show'])->name('bons.show');
Route::get('bons/{id}/pdf', [BonDachatController::class, 'generatePDF'])->name('bons.downloadPDF');

//Ressources stations


// Ressource complète pour les stations (index, create, store, edit, update, destroy)
Route::resource('stations', StationController::class);









