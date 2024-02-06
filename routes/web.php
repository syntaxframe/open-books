<?php

use App\Http\Controllers\AdminController as AdminController;
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
Route::get('/', function (\Illuminate\Http\Request $request) {
  $books = new \App\Http\Controllers\BookController();
  $genres = new \App\Http\Controllers\GenresController();
  return view('pages.home.home', [
    'title' => 'Home page',
    'genres' => $genres->index(),
    'books' => $books->index($request->query('gid') ? $request->query('gid') : null),
  ]);
})->name('home');

Route::controller(LoginRegisterController::class)->group(function () {
  Route::middleware('guest')->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/signup', 'create')->name('signup');

    Route::post('register', 'store');
    Route::post('signIn', 'login');
  });
  Route::middleware('auth')->group(function () {
    Route::post('logout', 'logout');
  });
});

Route::group(['middleware' => 'admin'], function () {
  Route::get('/book/add',  [AdminController::class, 'index']);
  Route::get('/book/{id}/edit',  [AdminController::class, 'update']);

  Route::post('/book/create', [\App\Http\Controllers\BookController::class, 'store']);
  Route::post('/book/update', [\App\Http\Controllers\BookController::class, 'update']);
});

Route::get('/books/{id}', function (\Illuminate\Http\Request $request, string $bookId) {
  $books = new \App\Http\Controllers\BookController();
  $book = $books->show($bookId);
  return view('pages.books.one_book', [
    'title' => $book->name,
    'book' => $book,
  ]);
});
