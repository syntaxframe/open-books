@extends('layouts.layout')

@section('content')
  <div class="mt-16 px-10">
    <div class="w-full flex gap-10">
      <div class="w-1/6">
        <img class="w-full rounded-xl aspect-[6/9]" src="{{'/storage/books/'.$book->image_path}}" alt="">
        @if(Auth::user() && Auth::user()->hasRole(DB::table('roles')->select('key')->whereRaw("LEFT(`key`, 3) = 'ADM'")->get()))
          <div class="mt-3 w-full grid grid-cols-2 gap-3">
            <a href="/book/{{$book->id}}/edit" class="flex justify-center items-center gap-2 bg-transparent border border-emerald-300 text-white rounded-xl px-3 py-2">Update</a>
            <form action="{{ url('/book/'.$book->id.'/delete') }}" method="post">
              @csrf
              @method('delete')
              <button class="flex justify-center items-center gap-2 bg-transparent border border-red-500 text-white rounded-xl px-3 py-2">Delete</button>
            </form>
          </div>
        @endif
      </div>
      <div class="w-full">
        <p class="text-gray-500">Genre: {{$book->genre_name}} | {{$book->language_name}}</p>
        <h1 class="-mt-1 text-gray-50 font-semibold text-4xl">
          {{$book->name}}
        </h1>
        <p class="mt-8 text-gray-300 text-2xl">{{$book->description}}</p>
      </div>
    </div>
  </div>
@endsection
