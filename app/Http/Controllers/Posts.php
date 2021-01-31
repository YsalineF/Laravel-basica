<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Posts extends Controller
{
    public function index(INT $limit = 4) {
      $posts = Post::orderBy('created_at', 'DESC')
                      ->paginate($limit);
      return view('posts.index', compact('posts'));
    }
}
