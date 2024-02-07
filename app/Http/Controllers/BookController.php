<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
  public function  index($gid = null)
  {
    if($gid) {
      return Book::all()->where('genre_id', $gid);
    } else return Book::all();
  }
  public function  show($bookId)
  {
    return DB::table('books')
      ->join('genres', 'books.genre_id', '=', 'genres.id')
      ->join('languages', 'books.lang_id', '=', 'languages.id')
      ->where('books.id', $bookId)
      ->select('books.*', 'genres.name as genre_name', 'languages.name as language_name')
      ->first();
  }
  public function store(CreateBookRequest $request)
  {
    if($request->hasFile('image_path')){
      $image = $request->file('image_path');
      $imagePath = time(). '.' . $image->getClientOriginalExtension();
      $image->storeAs('public/books/' . $imagePath);
    }
    Book::create([
      'name' => $request['name'],
      'description' => $request['description'],
      'author_id' => null,
      'genre_id' => $request['genre_id'],
      'lang_id' => $request['lang_id'],
      'image_path' => $imagePath ? $imagePath : null,
      'publication_date' => Carbon::now(),
      'edition_year' => null,
    ]);

    return redirect(route('home'));
  }
  public function update(CreateBookRequest $request, $bookId)
  {
    $book = Book::findOrFail($bookId);
    if($request->hasFile('image_path')){
      $image_path = "/public/books/".$book['image_path'];
      if(Storage::exists($image_path)) {
        Storage::delete($image_path);
      }

      $image = $request->file('image_path');
      $imagePath = time(). '.' . $image->getClientOriginalExtension();
      $image->storeAs('public/books/' . $imagePath);
    }
    $book->name = $request['name'];
    $book->description = $request['description'];
    $book->genre_id = $request['genre_id'];
    $book->lang_id = $request['lang_id'];
    $book->image_path = $imagePath ? $imagePath : null;

    $book->update();

    return redirect()->route('one_book', $bookId);
  }
  public function destroy($bookId)
  {
    $book = Book::findOrFail($bookId);
    $image_path = "/public/books/".$book['image_path'];
    if(Storage::exists($image_path)) {
      Storage::delete($image_path);
    }
    $book->delete();
    return redirect()->route('home');
  }
}
