<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/user/login', function () {
  return response(['text' => 'hui']);
});


//Route::controller(LoginRegisterController::class)->group(function () {
//  Route::get('/', 'show')->name('home');
//
//  Route::get('/login', 'index')->name('login');
//  Route::get('/signup', 'create')->name('signup');
//
//
//  change names
//  Route::post('register', 'store');
//  Route::post('signIn', 'login');
//  Route::post('logout', 'logout');
//});
//
//Route::group(['middleware' => 'admin'], function () {
//  Route::get('/book/add',  [AdminController::class, 'index']);
//});
