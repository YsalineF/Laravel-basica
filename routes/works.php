<?php

use App\Http\Controllers\Works;

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
