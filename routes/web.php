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
});

use App\Http\Controllers\UserController;
use App\Http\Controllers\BilletController;

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);



Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');




Route::get('/billets/create', [BilletController::class, 'create'])->middleware('auth')->name('billets.create');
Route::post('/billets', [BilletController::class, 'store'])->middleware('auth')->name('billets.store');
Route::get('/billets/{id}', [BilletController::class, 'show'])->middleware('auth')->name('billets.show');
Route::get('/billets', [BilletController::class, 'index'])->middleware('auth')->name('billets.index');
Route::delete('/billets/{id}', [BilletController::class, 'cancel'])->middleware('auth')->name('billets.cancel');