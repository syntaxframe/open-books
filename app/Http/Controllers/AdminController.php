<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
      $genres = new GenresController();
      return view('pages.admin.createBook', [
        'title' => 'Open Books :: create book',
        'genres' => $genres->index(),
      ]);
    }
    public function update($bookId)
    {
      $books = new BookController();
      $genres = new GenresController();
      return view('pages.admin.editBook', [
        'title' => 'Open Books :: edit book',
        'genres' => $genres->index(),
        'book' => $books->show($bookId),
      ]);
    }
}
