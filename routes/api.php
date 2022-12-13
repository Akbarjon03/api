<?php

use App\Http\Controllers\PlanesController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::resource('planes', planesController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/planes', [planesController::class, 'index']);
Route::get('/planes/{id}', [planesController::class, 'show']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/planes', [planesController::class, 'store']);
    Route::put('/planes/{id}', [planesController::class, 'update']);
    Route::delete('/planes/{id}', [planesController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
