<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__.'/works.php';
require __DIR__.'/posts.php';
require __DIR__.'/admin_posts.php';
require __DIR__.'/auth.php';

// ROUTE PAR DEFAUT
// PATTERN: /
Route::get('/', function () {
    return view('home.index');
})->name('home');

// ROUTE PAGE CONTACT
// PATTERN: /contact-us
Route::get('/contact-us', function() {
  return view('contact.index');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
