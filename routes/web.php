<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcController;
use App\Http\Controllers\PanneController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\CarburantController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\FonctionnaireController;

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
    return view('welcome');
});

Route::get('/home',"App\Http\Controllers\VehiculeController@push");

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home',"App\Http\Controllers\VehiculeController@push");

    Route::resource('/parcs', ParcController::class);
    Route::resource('/fonctionnaires', FonctionnaireController::class);
    Route::resource('/vehicules', VehiculeController::class);
    Route::resource('/pannes', PanneController::class);
    Route::resource('/reparations', ReparationController::class);
    Route::resource('/missions', MissionController::class);
    Route::resource('/carburants', CarburantController::class);
   
   
});

