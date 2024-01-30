@extends('layouts.layout')

@section('content')
  <section class="px-10 md:mx-auto mt-12">
    <h2 class="text-3xl font-semibold text-gray-50">Create book</h2>
    <div class="">
      <form action="/createBook" class="w-96 mt-8 flex flex-col gap-3" method="post">
        @csrf
        <div>
          <input type="text" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('name') is-invalid @enderror" name="name" placeholder="Name of book*" value="{{ old('name') }}">
          @error('name')
          <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <textarea type="text" class="w-full text-gray-300 bg-inherit border border-gray-900 rounded px-2 py-1 @error('description') is-invalid @enderror" name="description" placeholder="Description">
            {{ old('description') }}
          </textarea>
          @error('description')
          <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <div class="relative group">
            <button type="button" id="dropdown-button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">
              <span class="mr-2">Open Dropdown</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
            <div id="dropdown-menu" class="hidden absolute right-0 mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1">
              <!-- Search input -->
              <input id="search-input" class="block w-full px-4 py-2 text-gray-800 border rounded-md  border-gray-300 focus:outline-none" type="text" placeholder="Search items" autocomplete="off">
              <!-- Dropdown content goes here -->
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Uppercase</a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Lowercase</a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Camel Case</a>
              <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">Kebab Case</a>
            </div>
          </div>
            {{ old('author_id') }}
          @error('author_id')
          <div class="alert alert-danger text-red-300">{{ $message }}</div>
          @enderror
        </div>
        <button class="mt-4 w-full bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Log in</button>
      </form>
    </div>
  </section>
  <script>
    // JavaScript to toggle the dropdown
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const searchInput = document.getElementById('search-input');
    let isOpen = false; // Set to true to open the dropdown by default

    // Function to toggle the dropdown state
    function toggleDropdown() {
      isOpen = !isOpen;
      dropdownMenu.classList.toggle('hidden', !isOpen);
    }

    // Set initial state
    toggleDropdown();

    dropdownButton.addEventListener('click', () => {
      toggleDropdown();
    });

    // Add event listener to filter items based on input
    searchInput.addEventListener('input', () => {
      const searchTerm = searchInput.value.toLowerCase();
      const items = dropdownMenu.querySelectorAll('a');

      items.forEach((item) => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  </script>
@endsection
