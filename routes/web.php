<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return inertia('Home');
});

Route::get('/users', function () {
  /* Demo progress indicator */
  // sleep(2);
  return inertia('Users', [
    'time' => date('H:i:s')
  ]);
});

Route::get('/settings', function () {
  return inertia('Settings');
});

Route::post('/logout', function () {
  dd("'action' param being passed from 'Nav.vue' Link button: " . request('action'));
});
