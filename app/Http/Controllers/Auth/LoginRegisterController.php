<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class LoginRegisterController extends Controller
{
  public function index()
  {
    return view('pages.login.login', [
      'title' => 'Login to open-books'
    ]);
  }
  public function create()
  {
    return view('pages.signup.signup', [
      'title' => 'Create account'
    ]);
  }
  public function show()
  {
    return view('pages.home.home', [
      'title' => 'Home page'
    ]);
  }

  public function store(Request $request) : RedirectResponse
  {
    $request->validate([
      'username' => 'unique:users|min:2|max:100',
      'email' => 'required|email|unique:users|min:3|max:150',
      'password' => ['required', 'confirmed', Password::min(10)->max(30)->mixedCase()->numbers()->symbols()->uncompromised()],
    ]);

//    create User model
//    User::create([
//      'username' => $request->username,
//      'email' => $request->email,
//      'password' => bcrypt($request->password),
//    ]);

    $credentials = $request->only('email', 'password');
    Auth::attempt($credentials);
    $request->session()->regenerate();

    return redirect()->route('home')->with(200, 'You`re logged in new account');
  }

  public function login(Request $request) : RedirectResponse
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    Auth::attempt($credentials);
    $request->session()->regenerate();

    return redirect()->route('home')->with(200, 'You`re logged in');
  }

  public function logout(Request $request) : RedirectResponse
  {
    return redirect()->route('home')->with(200, 'You`re logged out');
  }
}
