<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('audio', App\Http\Controllers\AudioController::class);


Route::resource('bengalis', App\Http\Controllers\BengaliController::class);


Route::resource('bengaliHoques', App\Http\Controllers\BengaliHoqueController::class);


Route::resource('cats', App\Http\Controllers\CatController::class);


Route::resource('catNames', App\Http\Controllers\CatNameController::class);


Route::resource('englishes', App\Http\Controllers\EnglishController::class);


Route::resource('pdfs', App\Http\Controllers\PdfController::class);


Route::resource('qurans', App\Http\Controllers\QuranController::class);


Route::resource('suras', App\Http\Controllers\SuraController::class);


Route::resource('tafsirs', App\Http\Controllers\TafsirController::class);
