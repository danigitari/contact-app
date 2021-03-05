<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashBoardController;
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

 Route::get('/', function () {
     return view('home');
 });

Route::get('/register', [RegisterController::class,'index']) -> name('register');
Route::post('/register', [RegisterController::class,'store']) -> middleware('guest');
Route::get('/login', [LoginController::class,'index'])-> name('get_login');
Route::post('/login', [LoginController::class,'store'])->middleware('guest') -> name('login');
Route::post('/logout', [LogoutController::class,'store']) -> name('logout');
Route::get('/dashboard',[DashBoardController::class,'index']) -> name('dashboard') -> middleware('auth');
Route::post('/dashboard', [DashBoardController::class,'store']) -> middleware('auth') -> name('createcontact') ;
Route::get('/display', [DashBoardController::class,'display']) -> name('display');
// Route::get('/update/{{ $item->id }}',[DashBoardController::class,'index']);
Route::get('/register', [RegisterController::class,'index']) -> name('register');
Route::post('/register', [RegisterController::class,'store']) -> middleware('guest');
Route::get('/edit/{id}',[DashBoardController::class,'edit']);
Route::post('/update/{id}',[DashBoardController::class,'update'])-> name('editcontacts');
Route::get('/delete/{id}',[DashBoardController::class,'destroy']);

//Gichuhibrian controller
