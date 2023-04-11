<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => 'role:karyawan',
    'prefix' => 'karyawan',
    'as' => 'karyawan.'
], function () {
    Route::get('/biodata', [KaryawanController::class, 'index'])->name('index');
    Route::post('/biodata/store', [KaryawanController::class, 'store'])->name('biodata.store');
    Route::post('/biodata/{id}/update', [KaryawanController::class, 'update'])->name('biodata.update');
});

Route::group([
    'middleware' => 'role:admin',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/biodata', [AdminController::class, 'index'])->name('index');
    Route::get('/biodata/{id}/delete', [AdminController::class, 'destroy'])->name('biodata.destroy');
});
