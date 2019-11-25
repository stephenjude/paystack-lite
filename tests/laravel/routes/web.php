<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes used to test @routeis and @routeisnot blade directives

Route::get('/popup', function () {
    return view('popup');
})->name('paystack.popup');

Route::get('/embedded', function () {
    return view('embedded');
});
