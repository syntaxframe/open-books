<?php

use App\Http\Controllers\Auth\LoginRegisterController as LoginRegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LoginRegisterController::class)->group(function () {
  Route::get('/', 'show')->name('home');

  Route::get('/login', 'index')->name('login');
  Route::get('/signup', 'create')->name('signup');

//  change names
  Route::post('register', 'store');
  Route::post('signIn', 'login');

});
