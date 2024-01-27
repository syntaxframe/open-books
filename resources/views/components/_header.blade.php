<header class="py-7">
  <nav class="px-10 flex justify-between items-center w-full">
    <a href="/">
      <img src="img/logo/logo.svg" alt="logo" class="h-24">
    </a>
    <ul class="list-none flex items-center gap-7">
      <li>
        <a href="/books" class="text-gray-50 font-medium text-xl border-b border-transparent transition-all duration-200 hover:border-current">Books</a>
      </li>
      <li>
        <a href="/random-book" class="text-gray-50 font-medium text-xl border-b border-transparent transition-all duration-200 hover:border-current">Random book</a>
      </li>
      <li>
        <a href="/become-author" class="text-gray-50 font-medium text-xl border-b border-transparent transition-all duration-200 hover:border-current">I`m author</a>
      </li>
    </ul>
    <div class="flex gap-3 items-center">
      @auth
        <a href="/profile" class="bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Profile</a>
        <form action="/logout" method="post">
          @csrf
          <button class="bg-none border border-emerald-500 text-white rounded-xl block px-3 py-2">Sign out</button>
        </form>
        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
          <a href="/admin" class="bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Admin page</a>
        @endif
      @else
        <a href="/login" class="bg-emerald-500 border border-emerald-500 text-white rounded-xl block px-3 py-2">Login</a>
        <a href="/signup" class="bg-none border border-emerald-500 text-white rounded-xl block px-3 py-2">Create account</a>
      @endauth
    </div>
  </nav>
</header>
