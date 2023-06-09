<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController as WebHomeController;
use App\Http\Controllers\Web\ItemsController;
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

Route::get('', [HomeController::class, 'index'])->name('index');
Route::get('cv', [HomeController::class, 'mycv'])->name('cv');

Route::prefix('system')->name('system.')->group(function() {
    Route::get('login', [AuthController::class, 'form'])->name('login.form');
    Route::post('login', [AuthController::class, 'submit'])->name('login.submit');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::resource('barang', ItemsController::class);
    Route::get('dashboard', [WebHomeController::class, 'index'])->name('dashboard');
    Route::get('barang/{id}/logs', [ItemsController::class, 'logs'])->name("barang.logs");
});
