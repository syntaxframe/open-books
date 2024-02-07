<?php

use App\Http\Controllers\AdminController as AdminController;
use App\Http\Controllers\Auth\LoginRegisterController as LoginRegisterController;
use App\Http\Controllers\GenresController as GenresController;
use \App\Http\Controllers\BookController as BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
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
Route::get('/', function (Request $request) {
  $books = new BookController();
  $genres = new GenresController();
  return view('pages.home.home', [
    'title' => 'Home page',
    'genres' => $genres->index(),
    'books' => $books->index($request->get('gid') ? $request->get('gid') : null),
    'request' => $request,
  ]);
})->name('home');

Route::get('/random-book', function () {
  $bookId = DB::table('books')->select('id')->inRandomOrder()->take(1)->get()[0]->id;
  $books = new BookController();
  $book = $books->show($bookId);
  return redirect()->route('one_book', $bookId);
});

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

  Route::post('/book/create', [BookController::class, 'store']);
  Route::put('/book/{id}/update', [BookController::class, 'update']);
  Route::delete('/book/{id}/delete', [BookController::class, 'destroy']);
});

Route::get('/books/{id}', function (Request $request, string $bookId) {
  $books = new BookController();
  $book = $books->show($bookId);
  return view('pages.books.one_book', [
    'title' => $book->name,
    'book' => $book,
  ]);
})->name('one_book');
