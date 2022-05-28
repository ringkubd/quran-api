<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('audio', App\Http\Controllers\API\AudioAPIController::class);


Route::resource('bengalis', App\Http\Controllers\API\BengaliAPIController::class);


Route::resource('bengali_hoques', App\Http\Controllers\API\BengaliHoqueAPIController::class);


Route::resource('cats', App\Http\Controllers\API\CatAPIController::class);


Route::resource('cat_names', App\Http\Controllers\API\CatNameAPIController::class);


Route::resource('englishes', App\Http\Controllers\API\EnglishAPIController::class);


Route::resource('pdfs', App\Http\Controllers\API\PdfAPIController::class);


Route::resource('qurans', App\Http\Controllers\API\QuranAPIController::class);


Route::resource('suras', App\Http\Controllers\API\SuraAPIController::class);


Route::resource('tafsirs', App\Http\Controllers\API\TafsirAPIController::class);
