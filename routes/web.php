<?php

use App\Http\Controllers\API\ShowController as APIShowController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    return redirect('login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

Route::get('register', [RegisterController::class, 'index'])->name('register-user');
Route::post('register', [RegisterController::class, 'customRegistration'])->name('register.custom');

Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [ShowController::class, 'index'])->name('dashbord.index');
    Route::get('/create', [ShowController::class, 'create_anime'])->name('dashbord.create_anime');
    Route::post('/create', [ShowController::class, 'store_anime']);
});

