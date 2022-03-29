<?php

use App\Http\Controllers\DatavaccinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LimitpaysController;
use App\Http\Controllers\LimitprovincesController;
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

Route::get('/', [HomeController::class,'index'])->name('home.dashboard');
Route::get('/limitPays_layer', [LimitpaysController::class,'index'])->name('pays.index');
Route::get('/provinces_layer', [LimitprovincesController::class,'index'])->name('provinces.index');
Route::get('/vaccination_layer', [DatavaccinationController::class,'index'])->name('vaccination.index');
