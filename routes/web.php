<?php

use App\Http\Controllers\API\ShowController as APIShowController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ShowController;
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

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [ShowController::class, 'index'])->name('dashbord.index');
    Route::get('/create', [ShowController::class, 'create_anime'])->name('dashbord.create_anime');
    Route::post('/create', [ShowController::class, 'store_anime']);
});
