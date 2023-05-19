<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
  return inertia('Home');
});

Route::get('/users', function () {
  return inertia('Users', [
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

Route::get('/settings', function () {
  return inertia('Settings');
});
