<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return inertia('Welcome', ['msg' => 'Hello World!',]);
});

/*
Note:
Using 'intertia()' saves having to use 'Inertia::render()', which required an import: 'use Inertia\ Inertia;'
*/
