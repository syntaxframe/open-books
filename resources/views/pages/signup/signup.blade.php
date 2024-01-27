@extends('layouts.layout')

@section('content')
  <section class="flex justify-between md:container md:mx-auto mt-32">
    <div>
      <h2 class="text-white text-3xl font-semibold">Create account</h2>
      <form action="/register" class="w-96 mt-8 flex flex-col gap-3" method="post">
        @csrf
        <div>
          <input type="text" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('username') is-invalid @enderror" name="username" placeholder="Username (unique)" value="{{ old('username') }}">
          @error('username')
            <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <input type="text" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('email') is-invalid @enderror" name="email" placeholder="Email*" value="{{ old('email') }}">
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
        <div>
          <div class="inline-flex items-center">
            <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="link">
              <input type="checkbox"
                     class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-emerald-500 checked:bg-emerald-500 checked:before:bg-emerald-500 hover:before:opacity-10"
                     id="link" name="agreement" @if(old('agreement')) checked @endif @error('agreement') is-invalid @enderror />

              <span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                     stroke="currentColor" stroke-width="1">
                  <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
              </span>
            </label>
            <label class="mt-px text-gray-300 cursor-pointer select-none" htmlFor="link">
              <p class="flex font-sans text-base antialiased leading-relaxed text-blue-gray-900">
                I agree with the
                <a href="/docks/user-agreements"
                   class="block font-sans text-base antialiased leading-relaxed text-blue-500 transition-colors hover:text-blue-700">
                  &nbsp;terms and conditions
                </a>
              </p>
            </label>
          </div>
          @error('agreement')
          <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <button class="mt-3 w-full bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Create account</button>
      </form>
    </div>
  </section>
@endsection
