<?php

use App\Http\Controller\api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix => 'users"], function () {
    Route::get('/', [UserController::class, 'create'] );
    Route::post('/add', [UserController::class, 'create'] );
    Route::patch('/{id}', [UserController::class, 'create'] );
    Route::delete('/{id}', [UserController::class, 'create'] );
});