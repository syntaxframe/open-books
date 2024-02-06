<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    return Book::all()->where('id', $bookId)->first();
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
  public function update(CreateBookRequest $request)
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
}
