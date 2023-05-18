<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
  return inertia('Home');
});

Route::get('/users', function () {
  return inertia('Users', [
    // 'users' => User::all()
    /* 
      Unlike traditional server side apps,
      client side apps, like Vue, expose all data.
      Use map() to only return required field(s).
    */
    'users' => User::all()->map(fn($user) => [
      'id' => $user->id,
      'name' => $user->name
    ])
  ]);
});

Route::get('/settings', function () {
  return inertia('Settings');
});
