<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\listeSolutionController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\QcmController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('Qcmliste', QcmController::class);
Route::resource('Solution', listeSolutionController::class);
Route::resource('etudiant', EtudiantController::class);
Route::get('/Etudiant/createEtud/{id}','App\Http\Controllers\EtudiantController@CreateEtudiant')->name('Etud.Create');
Route::get('/Etudinat/pdf', 'App\Http\Controllers\listeSolutionController@generatePDF')->name('PDFetudiants');