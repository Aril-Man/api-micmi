<?php

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


Route::get('/show', [ShowController::class, 'index']);
Route::get('/show/{id}', [ShowController::class, 'show']);
Route::put('/show/{id}', [ShowController::class, 'update']);
Route::delete('/show/{id}', [ShowController::class, 'destroy']);