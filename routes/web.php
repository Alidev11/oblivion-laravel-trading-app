<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BotsController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/check-connection', [DatabaseController::class, 'checkConnection']);


Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(DashboardController::class)->group(function(){
    Route::get('home', 'index')->middleware('auth')->name('home');
});
Route::controller(ProfileController::class)->group(function(){
    Route::get('profile', 'index')->middleware('auth')->name('profile');
    Route::post('profile', 'edit')->middleware('auth')->name('profile.edit');
});
Route::middleware(['auth'])->group(function () {
    Route::get('mybots', [BotsController::class, 'index'])->name('mybots.index');
    Route::post('mybots', [BotsController::class, 'store'])->name('mybots.store');
    Route::put('mybots/{id}/edit', [BotsController::class, 'update'])->name('mybots.update');
    Route::get('mybots/{id}/edit', [BotsController::class, 'edit'])->name('mybots.edit');
    Route::post('mybots/{id}', [BotsController::class, 'destroy'])->name('mybots.destroy');

    Route::get('mysettings', [SettingController::class, 'index'])->name('mysettings.index');
    Route::post('mysettings', [SettingController::class, 'store'])->name('mysettings.store');
    Route::post('mysettings/{id}', [SettingController::class, 'destroy'])->name('mysettings.destroy');
    Route::get('mysettings/{id}', [SettingController::class, 'show'])->name('mysettings.show');
    Route::put('mysettings/{id}/edit', [SettingController::class, 'update'])->name('mysettings.update');

    Route::get('chart-data', [ChartController::class, 'getChartData'])->name('chartData.index');

});

