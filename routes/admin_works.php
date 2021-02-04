<?php

use App\Http\Controllers\AdminWorks;

// ADMIN : LISTE DES WORKS
// PATTERN: /admin/works
// CTRL: AdminWorks
// ACTION: index
Route::get('/admin/works', [AdminWorks::class, 'index'])->name('admin.works.index');

// ADMIN : AJOUT D'UN WORK : FORMULAIRE
// PATTERN: /admin/work/add/form
// CTRL: AdminWorks
// ACTION: create
Route::get('/admin/works/add/form', [AdminWorks::class, 'create'])->name('admin.works.create');

// ADMIN : AJOUT D'UN WORK : INSERT
// PATTERN: /admin/work/add/insert
// CTRL: AdminWorks
// ACTION: store
Route::post('/admin/works/add/insert', [AdminWorks::class, 'store'])->name('admin.works.store');

// ADMIN : EDIT D'UN WORK : FORMULAIRE
// PATTERN: /admin/work/edit/form/{work}
// CTRL: AdminWorks
// ACTION: edit
Route::get('/admin/works/edit/form/{work}', [AdminWorks::class, 'edit'])->name('admin.works.edit');

// ADMIN : EDIT D'UN WORK : UPDATE
// PATTERN: /admin/work/edit/{work}
// CTRL: AdminWorks
// ACTION: update
Route::put('/admin/works/edit/{work}', [AdminWorks::class, 'update'])->name('admin.works.update');
