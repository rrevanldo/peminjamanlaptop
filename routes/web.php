<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;

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

Route::middleware('isGuest')->group(function () {
    Route::get('/', [LaptopController::class, 'login'])->name('login');
    Route::get('/register', [LaptopController::class, 'register'])->name('register');
    Route::post('/register', [LaptopController::class, 'inputRegister'])->name('register.post');
    Route::post('/login', [LaptopController::class, 'auth'])->name('login.auth');
});

Route::get('/logout', [LaptopController::class, 'logout'])->name('logout');

Route::middleware('isLogin')->prefix('/dashboard')->name('dashboard.')->group(function () {
Route::get('/', [LaptopController::class, 'index'])->name('index');
Route::get('/data', [LaptopController::class, 'data'])->name('data');
Route::get('/create', [LaptopController::class, 'create'])->name('create');
Route::post('/store', [LaptopController::class, 'store'])->name('store');
Route::delete('/delete/{id}', [LaptopController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [LaptopController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [LaptopController::class, 'update'])->name('update');
Route::get('/complated', [Laptop::class, 'complated'])->name('complated');
Route::patch('/complated/{id}', [LaptopController::class, 'updateComplated'])->name('update-complated');
});         