@extends('layouts.layout')

@section('content')
  <section class="mt-3 px-10">
    <h1 class="text-amber-50 text-4xl font-bold">Books</h1>
    <div class="mt-4 flex gap-8 content-center pb-2 border-b border-gray-900">
      @foreach($genres as $genre)
        <a class="text-amber-50 text-xl" href="/?gid={{$genre->id}}">{{$genre->name}}</a>
      @endforeach
    </div>
    <div class="mt-8 grid grid-cols-6 gap-x-7 gap-y-7">
      @foreach($books as $book)
        <div class="w-full">
          <a href="/books/{{$book->id}}">
            <img class="rounded-xl w-full aspect-[6/9]" src="{{'/storage/books/'.$book->image_path}}" alt="">
          </a>
          <div class="w-full p-1 pt-3 pb-0">
            <h3 class="text-amber-50">
              {{$book->name}}
            </h3>
          </div>
        </div>
      @endforeach
    </div>

  </section>
@endsection
