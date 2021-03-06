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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("list",[DashBoardController::class,'list']);
Route::get("list/{id}",[DashBoardController::class,'listid']);
Route::delete('/delete/{id}',[DashBoardController::class,'delete']);
Route::post("update/{id}",[DashBoardController::class,'update']);
Route::post('/add',[DashBoardController::class,'store']);
