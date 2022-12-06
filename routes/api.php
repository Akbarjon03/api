<?php

use App\Http\Controllers\VolcanoesController;
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

//Route::resource('volcanoes', VolcanoesController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/volcanoes', [VolcanoesController::class, 'index']);
Route::get('/volcanoes/{id}', [VolcanoesController::class, 'show']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/volcanoes', [VolcanoesController::class, 'store']);
    Route::put('/volcanoes/{id}', [VolcanoesController::class, 'update']);
    Route::delete('/volcanoes/{id}', [VolcanoesController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
