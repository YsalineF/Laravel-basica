<?php

use App\Http\Controllers\AdminPosts;

// ADMIN : LISTE DES POSTS
// PATTERN: /admin/posts
// CTRL: AdminPosts
// ACTION: index
Route::get('/admin/posts', [AdminPosts::class, 'index'])->name('admin.posts.index');

// ADMIN : AJOUT D'UN POST : FORMULAIRE
// PATTERN: /admin/posts/add/form
// CTRL: AdminPosts
// ACTION: create
Route::get('/admin/posts/add/form', [AdminPosts::class, 'create'])->name('admin.posts.create');

// ADMIN : AJOUT D'UN POST : INSERT
// PATTERN: /admin/posts/add/insert
// CTRL: AdminPosts
// ACTION: store
Route::post('/admin/posts/add/insert', [AdminPosts::class, 'store'])->name('admin.posts.store');
