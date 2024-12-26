<?php

use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ShipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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

Route::get('/', [SiteController::class, 'home']);

Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login', [SiteController::class, 'login']);
Route::post('/register', [SiteController::class, 'register']);
Route::get('/register', [SiteController::class, 'registerForm']);

Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [SiteController::class, 'logout']);

    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/passengers/create', [PassengerController::class, 'create']);
    Route::get('/passengers/edit/{id}', [PassengerController::class, 'edit']);
    Route::get('/passengers/delete/{id}', [PassengerController::class, 'delete']);
    Route::get('/passengers/view/{id}', [PassengerController::class, 'view']);
    Route::delete('/passengers/{passenger}', [PassengerController::class, 'destroy']);
    Route::put('/passengers/{passenger}', [PassengerController::class, 'update']);
    Route::get('/passengers', [PassengerController::class, 'index']);
    Route::post('/passengers', [PassengerController::class, 'store']);

    Route::get('/ships/create', [ShipController::class, 'create']);
    Route::get('/ships/edit/{id}', [ShipController::class, 'edit']);
    Route::put('/ships/{ship}', [ShipController::class, 'update']);
    Route::get('/ships/delete/{id}', [ShipController::class, 'delete']);
    Route::delete('/ships/{ship}', [ShipController::class, 'destroy']);
    Route::get('/ships', [ShipController::class, 'index']);
    Route::post('/ships', [ShipController::class, 'store']);
});
