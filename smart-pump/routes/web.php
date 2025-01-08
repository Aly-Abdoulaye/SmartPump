<?php

use Illuminate\Support\Facades\Route;
Use App\Http\controllers\DashboardController;

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

route::get('/',[DashboardController::class,'Dashboard'])->name('Dashboard.index');
