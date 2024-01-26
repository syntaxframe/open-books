@extends('layouts.layout')

@section('content')
  <section class="flex justify-between md:container md:mx-auto mt-32">
    <div>
      <h2 class="text-white text-3xl font-semibold">Create account</h2>
      <form action="/register" class="w-80 mt-8 flex flex-col gap-3">
        <div>
          <input class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1" name="username" placeholder="Username (unique)">
        </div>
        <div>
          <input class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1" name="email" placeholder="Email*">
        </div>
        <div>
          <input class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1" name="password" placeholder="Password*">
        </div>
        <div>
          <input class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1" name="password_require" placeholder="Repeat password*">
        </div>
        <button class="mt-3 w-full bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Create account</button>
      </form>
    </div>
  </section>
@endsection
