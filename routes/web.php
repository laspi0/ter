<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

use App\Http\Controllers\UserController;
use App\Http\Controllers\BilletController;

Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');





Route::get('/dashboard', [BilletController::class, 'dashboard'])->middleware('auth')->name('billets.dashboard');
// Route::resource('billets', BilletController::class)->middleware("auth");
Route::get('/billets/create', [BilletController::class, 'create'])->middleware('auth')->name('billets.create');
Route::post('/billets', [BilletController::class, 'store'])->middleware('auth')->name('billets.store');
Route::get('/billets/{id}', [BilletController::class, 'show'])->middleware('auth')->name('billets.show');
Route::get('/billets', [BilletController::class, 'index'])->middleware('auth')->name('billets.index');
Route::delete('/billets/{id}', [BilletController::class, 'cancel'])->middleware('auth')->name('billets.cancel');
