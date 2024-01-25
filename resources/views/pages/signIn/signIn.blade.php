@extends('layouts.layout')

@section('content')
    <section class="flex flex-col justify-center md:container md:mx-auto mt-14">
        <form action="/createAccount" method="post" class="md:mx-auto w-72 flex flex-col gap-5">
        <h2>Create new account</h2>
        @csrf
        <input class="py-2 px-3 rounded-md border border-gray-100 focus:outline-0 focus:border-gray-200" type="text"
                name="username"
                placeholder="Username*">
        <input class="py-2 px-3 rounded-md border border-gray-100 focus:outline-0 focus:border-gray-200" type="text"
                name="email"
                placeholder="E-mail*">
        <input class="py-2 px-3 rounded-md border border-gray-100 focus:outline-0 focus:border-gray-200" type="password"
                name="password" placeholder="Password">
        <button class="bg-blue-700 text-white px-5 py-2 rounded-md transition-all duration-200 hover:bg-blue-800">
            Create account
        </button>
        </form>
        @if ($errors->any())
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>
                <p class="text-red-600">
                    {{ $error }}
                </p>
                </li>
            @endforeach
            </ul>
        </div>
        @endif
  </section>
@endsection
