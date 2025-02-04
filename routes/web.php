<?php

use Illuminate\Support\Facades\Route;
Use App\Http\controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;


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
