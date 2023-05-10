<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\User\UserDashboardController;

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


Route::get('/', [HomeController::class, 'welcome'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user-active/{id}', [DashboardController::class, 'userActive'])->name('user.active');
    Route::get('/user-inactive/{id}', [DashboardController::class, 'userInactive'])->name('user.inactive');
    Route::get('/user-delete/{id}', [DashboardController::class, 'userDelete'])->name('user.delete');

});

Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'user', 'middleware' => ['auth', 'user']], function () {
    
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');

});