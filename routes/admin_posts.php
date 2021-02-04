<?php

use App\Http\Controllers\AdminPosts;

// ADMIN : LISTE DES POSTS
// PATTERN: /admin/posts
// CTRL: AdminPosts
// ACTION: index
Route::get('/admin/posts', [AdminPosts::class, 'index'])->name('admin.posts.index');
