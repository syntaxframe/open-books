@extends('layouts.layout')

@section('content')
  <section class="flex justify-between md:container md:mx-auto mt-32">
    <div>
      <h2 class="text-white text-3xl font-semibold">Log in</h2>
      <form action="/signIn" class="w-96 mt-8 flex flex-col gap-3" method="post">
        @csrf
        <div>
          <input type="text" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('emailuid') is-invalid @enderror" name="emailuid" placeholder="Email or username*" value="{{ old('emailuid') }}">
          @error('emailuid')
          <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <input type="password" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('password') is-invalid @enderror" name="password" placeholder="Password*">
          @error('password')
          <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <button class="mt-4 w-full bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Log in</button>
      </form>
    </div>
  </section>
@endsection
