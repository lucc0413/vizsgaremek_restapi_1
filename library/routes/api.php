<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibraryController;
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

Route::post("/login",[AuthController::class , "login"]);
Route::post("/register",[AuthController::class , "register"]);
Route::get("/library",[LibraryController::class,"index"]);
Route::post("/library{id}",[LibraryController::class,"show"]);
Route::delete("library{id}",[LibraryController::class,"delete"]);
Route::put("library{library}",[LibraryController::class,"update"]);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

