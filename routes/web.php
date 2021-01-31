<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Works;
use App\Http\Controllers\Posts;

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

// ROUTE PAR DEFAUT
// PATTERN: /
Route::get('/', function () {
    return view('home.index');
})->name('home');

// ROUTE PORTFOLIO : LISTE DES WORKS
// PATTERN: /portfolio
// CTRL: Works
// ACTION: index
Route::get('/portfolio', [Works::class, 'index'])->name('works.index');

// ROUTE PORTFOLIO : MORE WORKS
// PATTERN: /portfolio/ajax/more
// CTRL: Works
// ACTION: more
Route::get('/portfolio/ajax/more', [Works::class, 'more'])->name('works.ajax.more');

// ROUTE PORTFOLIO : DETAIL D'UN WORK
// PATTERN : /portfolio/work/slug
// CTRL: Works
// ACTION: show
Route::get('/portfolio/{work}/{slug}', [Works::class, 'show'])
        ->where('work', '[1-9][0-9]*')
        ->where('slug', '[a-z0-9][a-z0-9\-]*')
        ->name('works.show');

// ROUTE BLOG : LISTE DES POSTS
// PATTERN: /blog
// CTRL: Posts
// ACTION: index
Route::get('/blog', [Posts::class, 'index'])->name('posts.index');

// ROUTE BLOG : DETAIL D'UN POST
// PATTERN: /blog/post/slug
// CTRL: Posts
// ACTION: show
Route::get('/blog/{post}/{slug}', [Posts::class, 'show'])
        ->where('post', '[1-9][0-9]*')
        ->where('slug', '[a-z0-9][a-z0-9\-]*')
        ->name('posts.show');

// ROUTE PAGE CONTACT
// PATTERN: /contact-us
Route::get('/contact-us', function() {
  return view('contact.index');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
