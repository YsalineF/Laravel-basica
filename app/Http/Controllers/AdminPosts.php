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
        'image' => 'nullable',
        'categorie_id' => 'required'
      ]);
      Post::create($request->all());
      return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post) {
      return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {
      $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable',
        'categorie_id' => 'required'
      ]);
      $post->update($request->all());
      return redirect()->route('admin.posts.index');
    }

    public function delete(Post $post) {
      $post->delete();
      return redirect()->route('admin.posts.index');
    }
}
