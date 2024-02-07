@extends('layouts.layout')

@section('content')
  <section class="px-6 md:mx-auto mt-12">
    <h2 class="text-3xl font-semibold text-gray-50">Edit book</h2>
    <div class="">
      <form action="{{url('/book/'.$book->id.'/update')}}" class="w-96 mt-8 flex flex-col gap-3" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-3">
          <div>
            <input type="text" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('name') is-invalid @enderror" name="name" placeholder="Name of book*" value="@if(old('name')){{old('name')}}@else{{$book->name}}@endif">
            @error('name')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
            @enderror
          </div>
          <div>
            <textarea class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('description') is-invalid @enderror" name="description" placeholder="Description">@if(old('description')){{old('description')}}@elseif($book->description){{$book->description}}@endif</textarea>
            @error('description')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
            @enderror
          </div>
          <div>
            <select name="genre_id" class="focus:bg-gray-800 w-full text-gray-100 bg-inherit border border-gray-900 rounded px-2 py-1 @error('genre_id') is-invalid @enderror">
              @foreach($genres as $genre)
                <option @if(old('genre_id')) @if(old('genre_id') == $genre->id) selected @endif @elseif($book->genre_id == $genre->id) selected @endif value="{{$genre->id}}">
                  {{$genre->name}}
                </option>
              @endforeach
            </select>
            @error('genre_id')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
            @enderror
          </div>
          <div>
            <select name="lang_id" class="focus:bg-gray-800 w-full text-gray-100 bg-inherit border border-gray-900 rounded px-2 py-1 @error('lang_id') is-invalid @enderror">
              @foreach((\Illuminate\Support\Facades\DB::table('languages')->get()) as $row)
                <option @if(old('lang_id')) @if(old('lang_id') == $row->id) selected @endif @elseif($book->lang_id == $row->id) selected @endif value="{{$row->id}}">
                  {{$row->name}}
                </option>
              @endforeach
            </select>
            @error('lang_id')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div>
          <div>
            <input class="text-amber-50" type="file" name="image_path">
            @error('image_path')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <button class="mt-4 w-full bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Edit book</button>
      </form>
    </div>
  </section>

@endsection
