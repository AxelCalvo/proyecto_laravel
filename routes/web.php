<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasillaControler;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\GraficaController;

Route::get('casilla/pdf', [CasillaControler::class,'generatepdf']);
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::get('preview', [GraficaController::class,'preview']);
Route::get('download', [GraficaController::class,'download'])->name('download');
 Route::resource('casilla',CasillaControler::class);
 Route::resource('candidato',CandidatoController::class);
// Route::resource('voto',VotoController::class);
 Route::resource('eleccion',EleccionController::class);
 //Route::resource('login',LoginController::class);
 
Route::get('login',[LoginController::class,'index'])->name('login');

Route::get('logout',[LoginController::class,'logout'])->name('logout');
 //Route::get('/login','App\Http\Controllers\Auth\LoginController@index');
 Route::get('/login/facebook', 'App\Http\Controllers\Auth\LoginController@redirectToFacebookProvider');
 Route::get('/login/facebook/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderFacebookCallback');
 
 Route::middleware(['auth'])->group(function(){
     Route::resource('voto',VotoController::class);
 });