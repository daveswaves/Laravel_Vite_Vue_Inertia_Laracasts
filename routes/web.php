<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
  return inertia('Home');
});

Route::get('/users', function () {
  return inertia('Users', [
    /*
      map() doesn't work with paginate() - use through().
      through() gets applied to the current slice of items.
    */
    'users' => User::paginate()->through(fn($user) => [
      'id' => $user->id,
      'name' => $user->name
    ])
  ]);
});

Route::get('/settings', function () {
  return inertia('Settings');
});
