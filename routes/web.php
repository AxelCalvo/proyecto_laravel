<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasillaControler;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\Api\CandidatoController;

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
 
 Route::resource('casilla',CasillaControler::class);
 Route::resource('candidato',CandidatoController::class);
 Route::resource('voto',VotoController::class);
 Route::resource('eleccion',EleccionController::class);