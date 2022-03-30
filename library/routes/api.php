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

Route::get("/libraryIds",[LibraryController::class,"getLibraryIds"]);
Route::get("/library/{id}",[LibraryController::class,"getLibrary"]);
Route::post("/createLibrary",[LibraryController::class,"createLibrary"]);
Route::put("/library/{id}",[LibraryController::class,"updateLibrary"]);
Route::delete("/library/{id}",[LibraryController::class,"deleteLibrary"]);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

