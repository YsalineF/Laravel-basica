<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPosts extends Controller
{
    public function index() {
      $posts = Post::orderBy('created_at', 'DESC')
                    ->get();
      return view('admin.posts.index', compact('posts'));
    }

    public function create() {
      return view('admin.posts.create');
    }

    public function store(Request $request) {
      $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',
        'categorie_id' => 'required'
      ]);
      Post::create($request->all());
      return redirect()->route('admin.posts.index');
    }
}
