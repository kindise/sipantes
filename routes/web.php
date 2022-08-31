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
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'member'], function () {
        Route::get('/registrasi', [App\Http\Controllers\MemberController::class, 'viewregistrasi'])->name('registrasi');
        Route::post('/formulir', [App\Http\Controllers\MemberController::class, 'formulir'])->name('submit-pendaftaran');
        Route::get('/list', [App\Http\Controllers\MemberController::class, 'list'])->name('list');
        Route::get('/datatable', [App\Http\Controllers\MemberController::class, 'datatable'])->name('datatable');
        Route::get('/pantau/{id}', [App\Http\Controllers\MemberController::class, 'pantau'])->name('pantau');
        Route::get('/log/{id}', [App\Http\Controllers\MemberController::class, 'log'])->name('log');
        Route::post('/detaildiagnosa', [App\Http\Controllers\MemberController::class, 'detaildiagnosa'])->name('detaildiagnosa');
        Route::post('/buatpantauan', [App\Http\Controllers\MemberController::class, 'buatpantauan'])->name('buatpantauan');
        Route::get('/dtablelog/{id}', [App\Http\Controllers\MemberController::class, 'dtablelog'])->name('dtablelog');
        Route::post('/hapuscatatan', [App\Http\Controllers\MemberController::class, 'hapuscatatan'])->name('hapuscatatan');
    });
});
