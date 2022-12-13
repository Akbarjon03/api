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

//Route::resource('Planes', PlanesController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/Planes', [PlanesController::class, 'index']);
Route::get('/Planes/{id}', [PlanesController::class, 'show']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/Planes', [PlanesController::class, 'store']);
    Route::put('/Planes/{id}', [PlanesController::class, 'update']);
    Route::delete('/Planes/{id}', [PlanesController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
