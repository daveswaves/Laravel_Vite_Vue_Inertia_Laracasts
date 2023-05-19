<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
  return inertia('Home');
});

Route::get('/users', function () {
  return inertia('Users/Index', [
    'users' => User::query()
      ->when(Request::input('search'), function ($query, $search) {
        $query->where('name', 'like', "%{$search}%");
      })
      ->paginate(10)
      // Appends the search query to the pagination page links.
      ->withQueryString()
      ->through(fn($user) => [
        'id' => $user->id,
        'name' => $user->name,
      ]),
    // Search input retains its search string from page to page (pagination)
    'filters' => request(['search'])
  ]);
});

Route::post('/users', function () {
  // Validate the request
  $atts = Request::validate([
    'name' => 'required',
    'email' => ['required', 'email'],
    'password' => 'required',
  ]);

  // Create new user
  User::create($atts);

  // Redirect
  return redirect('/users');
});

Route::get('/users/new', function () {
  return inertia('Users/New');
});

Route::get('/settings', function () {
  return inertia('Settings');
});
