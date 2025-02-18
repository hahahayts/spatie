<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('pages.LandingPage');
})->name('landing');


Route::get('/home', function () {
    return view('pages.home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::view('/transactions', 'pages.transaction')->middleware(['auth', 'can:manage-transactions']);

Route::get('/users', [UsersController::class, 'index'])->middleware(['auth', 'can:manage-users'])->name('users.editPermission');
Route::get('/users/edit-permission/{user}',[UsersController::class, 'getUser']);
Route::post('/users/edit-permission/{user}',[UsersController::class, 'editPermission']);
Route::delete('/users/{id}', [UsersController::class, 'deleteUser'])->name('users.delete');


