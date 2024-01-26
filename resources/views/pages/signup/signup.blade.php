@extends('layouts.layout')

@section('content')
  <section class="flex justify-between md:container md:mx-auto mt-32">
    <div>
      <h2 class="text-white text-3xl font-semibold">Create account</h2>
      <form action="/register" class="w-96 mt-8 flex flex-col gap-3" method="post">
        @csrf
        <div>
          <input type="text" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('username') is-invalid @enderror" name="username" placeholder="Username (unique)">
          @error('username')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <input type="text" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('email') is-invalid @enderror" name="email" placeholder="Email*">
          @error('email')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <input type="password" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('password') is-invalid @enderror" name="password" placeholder="Password*">
          @error('password')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <input type="password" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Repeat password*">
          @error('password_confirmation')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <button class="mt-3 w-full bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Create account</button>
      </form>
    </div>
  </section>
@endsection
