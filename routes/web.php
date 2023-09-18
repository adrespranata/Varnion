<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'showData'])->name('showData');

// JSON
Route::get('/fetch-random-user-data', [HomeController::class, 'fetchRandomUserData'])->name('fetchRandomUserData');
Route::get('/fetch-data-25-kali', [HomeController::class, 'FetchData25'])->name('FetchData25');
Route::get('/ringkasan-profesi', [HomeController::class, 'professionSummary'])->name('professionSummary');

// View
Route::get('/fetch-random-data', [HomeController::class, 'fetchRandomData'])->name('fetchRandomData');
Route::get('/ringkasan', [HomeController::class, 'showProfessionSummary'])->name('showProfessionSummary');


