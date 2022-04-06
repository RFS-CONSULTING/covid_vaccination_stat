<?php

use App\Http\Controllers\DatavaccinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LimitpaysController;
use App\Http\Controllers\LimitprovincesController;
use App\Http\Controllers\SitesVaccinationController;
use App\Http\Controllers\VilleController;
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
Route::get('/province/{id}', [LimitprovincesController::class,'show'])->name('provinces.show');
Route::get('/vaccination_layer', [DatavaccinationController::class,'index'])->name('vaccination.index');
Route::get('/sites_vaccination/{province_id}', [SitesVaccinationController::class,'show'])->name('site_vaccination.show');
Route::get('/villes/{province_id}', [VilleController::class,'index'])->name('ville.index');
