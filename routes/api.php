<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::prefix('categories')->group(function(){
    Route::get('/',[CategoryController::class,'index']);
    Route::get('/{id}',[CategoryController::class,'show']);
});

Route::prefix('adverts')->group(function(){
    Route::get('/',[AdvertController::class,'index']);
    Route::get('/{id}',[AdvertController::class,'show']);
});

Route::prefix('companies')->group(function(){
    Route::get('/',[UserController::class,'index']);
    Route::get('/{id}',[UserController::class,'show']);
});
