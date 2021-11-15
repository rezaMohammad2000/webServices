<?php

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

Route::apiResource('user',\App\Http\Controllers\UsersController::class);
Route::apiResource('picture',\App\Http\Controllers\PicturesController::class)->except("show","index");
Route::apiResource('owner',\App\Http\Controllers\OwnersController::class)->only("update");
Route::apiResource('active',\App\Http\Controllers\ActivePersonalsController::class)->only("update");
Route::apiResource('media',\App\Http\Controllers\MediasController::class)->only("update","delete");
Route::apiResource('state',\App\Http\Controllers\StatesController::class)->only("update");


Route::fallback(function (){
   return response()->json([
        'message'=>'your page not found'
   ],404);
});
