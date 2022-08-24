<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => false, 'register' => false]);
Route::middleware(['auth'])->group(function () {
   /*  Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'pusatlayanan'], function () {
        Route::get('/create-ticket', [App\Http\Controllers\TiketController::class, 'createticket'])->name('create-ticket');
        Route::post('/submit-ticket', [App\Http\Controllers\TiketController::class, 'submit_tiket'])->name('submit-ticket');
        Route::get('/cari-unit', [App\Http\Controllers\TiketController::class, 'cariunit'])->name('cari-unit');
        Route::get('/antrian-tiket', [App\Http\Controllers\TiketController::class, 'viewantrian'])->name('antrian-tiket');
        Route::get('/datatable-antrian', [App\Http\Controllers\TiketController::class, 'datatableantrian'])->name('datatable-antrian');
    }); */

});
