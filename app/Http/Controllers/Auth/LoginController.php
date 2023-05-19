<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function create()
  {
    return inertia('Auth/Login');
  }

  // Copied from https://laravel.com/docs/9.x/authentication#authenticating-users
  public function store(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended(); // Defaults to homepage
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function destroy()
  {
    Auth::logout();

    return redirect()->route('login');
  }
}
