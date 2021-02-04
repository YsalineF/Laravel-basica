<?php

use App\Http\Controllers\AdminWorks;

// ADMIN : LISTE DES WORKS
// PATTERN: /admin/works
// CTRL: AdminWorks
// ACTION: index
Route::get('/admin/works', [AdminWorks::class, 'index'])->name('admin.works.index');
