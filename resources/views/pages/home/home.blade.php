@extends('layouts.layout')

@section('content')
  <section id="books" class="pt-3 px-10">
    <h1 class="text-amber-50 text-4xl font-bold">Books</h1>
    <div class="mt-4 flex gap-8 content-center pb-2 border-b border-gray-900">
        <a @if(!$request->get('gid')) class="text-emerald-600 text-xl" @else class="text-gray-50 text-xl" @endif href="/#books">All books</a>
      @foreach($genres as $genre)
        <a @if($request->get('gid') == $genre->id) @if($request->get('gid')) class="text-emerald-600 text-xl" @endif @else class="text-gray-50 text-xl" @endif href="/?gid={{$genre->id}}#books">{{$genre->name}}</a>
      @endforeach
    </div>
    @if(count($books) != 0)
      <div class="pt-8 grid grid-cols-6 gap-x-7 gap-y-7">
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
    @else
      <div class="pt-8">
        <h3 class="text-gray-100 text-2xl font-normal">
          @if($request->get('gid'))
            There`re no books in genre <span class="font-medium underline">{{$genres->get($request->get('gid') - 1)->name}}😓</span>
          @else
            There`re no many books😓
          @endif
        </h3>
      </div>
    @endif

  </section>
@endsection
