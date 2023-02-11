<?php

use App\Http\Controllers\UserController;
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

// ELEQUENT 
// add

// elequent/add
Route::prefix('user')->group(function(){
    Route::post('/', [UserController::class, 'create']);
    Route::patch('/update-user/{id}', [UserController::class, 'update']);
    Route::delete('/delete-user/{id}', [UserController::class, 'delete']);


});
Route::get('user', [UserController::class, 'view']);
Route::get('hello', function (){
 return "hello";   
});