<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('site.index');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/register', function () {
    // ...
})->middleware(['auth:sanctum']);

Route::get('/offline', function () {
    return view('offline');
});
