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
     * On vérifie un fichier image a été envoyé, si c'est le cas :
     *    - on renomme l'image avec le l'heure UNIX actuelle et l'extension du fichier
     *    - on enregistre l'image dans le storage laravel
     *    - on envoie l'image vers son emplacement public
     *    - on utilise request->only pour enregistrer le nom de l'image dans la db (ex: 1612480033.jpg)
     * Si aucun fichier n'a été envoyé, l'image 1.png apparait
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
      if($request->hasFile('image')) :
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('posts/images', $imageName);
        $request->image->move(public_path('assets/img/blog'), $imageName);
      else:
        $imageName = "1.jpg";
      endif;
      Post::create($request->only(['title', 'content', 'categorie_id']) + ['image' => $imageName]);
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
     * On vérifie un fichier image a été envoyé, si c'est le cas :
     *    - on renomme l'image avec le l'heure UNIX actuelle et l'extension du fichier
     *    - on enregistre l'image dans le storage laravel
     *    - on envoie l'image vers son emplacement public
     *    - on utilise request->only pour enregistrer le nom de l'image dans la db (ex: 1612480033.jpg)
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
      if($request->hasFile('image')) :
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('posts/images', $imageName);
        $request->image->move(public_path('assets/img/blog'), $imageName);
        // Si on a bien une photo a update
        $post->update($request->only(['title', 'content', 'categorie_id']) + ['image' => $imageName]);
      else:
        // Si on a pas de photo à update
        $post->update($request->only(['title', 'content', 'categorie_id']));
      endif;
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
