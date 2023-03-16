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
    return view('public_pages.home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|-----------------------------------------------------------------------------------------------------------------
| Authentication - Public page
|-----------------------------------------------------------------------------------------------------------------
*/
Route::namespace('Auth')->prefix('auth')->name('auth.')->group(function() {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/authenticate', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('authenticate');
});

Route::match(['get', 'post'], '/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

/*
|-----------------------------------------------------------------------------------------------------------------
| Dashboard
|-----------------------------------------------------------------------------------------------------------------
*/
Route::namespace('Dashboards')->prefix('secure')->name('secure.')->group(function() {
    Route::get('/home', [App\Http\Controllers\Dashboards\HomeController::class, 'index'])->name('home');
    Route::get('/users/user-list', [App\Http\Controllers\Dashboards\HomeController::class, 'userList'])->name('users.user-list');
    Route::get('/users/get-users', [App\Http\Controllers\Dashboards\HomeController::class, 'getUserList'])->name('users.get-users');
    Route::get('/users/get-user-data', [App\Http\Controllers\Dashboards\HomeController::class, 'getUserData'])->name('users.get-user-data');
    Route::get('/users/blank-page', [App\Http\Controllers\Dashboards\HomeController::class, 'blankPage'])->name('users.blank-page');
});
