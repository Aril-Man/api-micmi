<?php

use App\Http\Controllers\Api\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ShowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Anime
Route::get('/anime', [ShowController::class, 'index']);
Route::get('/anime/{id}', [ShowController::class, 'show']);
Route::patch('/anime/{id}', [ShowController::class, 'update']);
Route::delete('/anime/{id}', [ShowController::class, 'destroy']);

// Genre
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);
Route::post('/genre', [GenreController::class, 'store']);
Route::patch('/genre/{id}', [GenreController::class, 'update']);
Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

// Episode
