<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPosts extends Controller
{
  /**
   * Fonction qui permet de charger les posts présents dans la db
   * dans la variablee $posts
   * et return de la vue admin.posts.index avec envoi de la variable $posts
   * @return [type] [description]
   */
    public function index() {
      $posts = Post::orderBy('created_at', 'DESC')
                    ->get();
      return view('admin.posts.index', compact('posts'));
    }

    /**
     * return de la view admin.posts.create
     * qui contient le formulaire d'ajout d'un post
     * @return [type] [description]
     */
    public function create() {
      return view('admin.posts.create');
    }

    /**
     * Fonction qui permet de vérifier si les différents champs
     * sont bien remplis et qui crée un nouvel objet de type Post
     * qui est "rempli" par les éléments validés précedemment
     * Quand tout cela est fait, return sur la page de gestion des posts (admin.posts.index)
     * @param  Request $request [elements envoyés depuis le formulaire]
     * @return [type]           [description]
     */
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

    /**
     * Return de la view admin.posts.edit
     * qui contient le formulaire d'edition d'un post
     * @param  Post   $post [description]
     * @return [type]       [description]
     */
    public function edit(Post $post) {
      return view('admin.posts.edit', compact('post'));
    }

    /**
     * Fonction qui permet de vérifier si les différents champs
     * sont bien remplis et qui update un objet existant de type Post
     * qui est "re-rempli" par les éléments validés précedemment
     * Quand tout cela est fait, return sur la page de gestion des posts (admin.posts.index)
     * @param  Request $request [elements envoyés depuis le formulaire]
     * @param  Post    $post    [description]
     * @return [type]           [description]
     */
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

    /**
     * Fonction qui permet la suppression d'un objet existant de type Post
     * et return sur la page de gestion des posts (admin.posts.index)
     * @param  Post   $post [description]
     * @return [type]       [description]
     */
    public function delete(Post $post) {
      $post->delete();
      return redirect()->route('admin.posts.index');
    }
}
