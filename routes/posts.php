<?php

use App\Http\Controllers\Posts;

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
