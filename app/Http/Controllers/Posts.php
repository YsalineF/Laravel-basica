<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Posts extends Controller
{
    /**
     * Fonction qui permet de charger les posts présents dans la db
     * dans la variable $posts
     * et return de la vue posts.index (page blog) avec envoi de la variable $posts
     * @param  integer $limit [limite du nombre de posts à charger]
     * @return [type]         [description]
     */
    public function index(INT $limit = 4) {
      $posts = Post::orderBy('created_at', 'DESC')
                      ->paginate($limit);
      return view('posts.index', compact('posts'));
    }

    /**
     * Fonction qui permet de charger un seul post
     * @param  Post   $post [description]
     * @return [type]       [description]
     */
    public function show(Post $post) {
      return view('posts.show', compact('post'));
    }
}
