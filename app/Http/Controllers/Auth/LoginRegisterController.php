<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
      'username' => 'required|unique:users|min:2|max:100',
      'email' => 'required|email|unique:users|min:3|max:150',
      'password' => ['required', 'confirmed', Password::min(10)->max(30)->mixedCase()->numbers()->symbols()->uncompromised()],
      'agreement' => 'required',
    ]);

    User::create([
      'username' => $request->username,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);
    DB::table('role_user')->insert([
      'user_id' => DB::getPdo()->lastInsertId(),
      'role_id' => (DB::table('roles')->select('id')->where('key', 'USR01')->get())[0]->id,
//      is this better than DB::raw()?
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    $credentials = $request->only('email', 'password');
    Auth::attempt($credentials, true);
    $request->session()->regenerate();

    return redirect()->route('home')->with(200, 'You`re logged in new account');
  }

  public function login(Request $request) : RedirectResponse
  {
    $login = $request->input('emailuid');
    $user = User::where('email', $login)->orWhere('username', $login)->first();

    if (!$user) {
      return redirect()->back()->withErrors(['emailuid' => 'Invalid username or email'])->withInput(['emailuid' => $request->input('emailuid')]);
    }

    $request->validate([
      'password' => 'required',
    ]);

    if (Auth::attempt(['email' => $user->email, 'password' => $request->password], true) ||
      Auth::attempt(['username' => $user->username, 'password' => $request->password], true)) {
      Auth::loginUsingId($user->id);
      return redirect('/');
    } else {
      return redirect()->back()->withErrors(['password' => 'Invalid login credentials']);
    }
  }

  public function logout(Request $request) : RedirectResponse
  {
    Auth::logout();
    return redirect()->route('home')->with(200, 'You`re logged out');
  }
}
