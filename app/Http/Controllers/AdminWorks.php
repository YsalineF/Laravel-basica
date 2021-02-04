<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class AdminWorks extends Controller
{
    /**
     * Fonction qui permet de charger les works présents dans la db
     * dans la variable $works
     * et return de la vue admin.posts.index avec envoi de la variable $works
     * @return [type] [description]
     */
    public function index() {
      $works = Work::orderBy('created_at', 'DESC')
                    ->get();
      return view('admin.works.index', compact('works'));
    }

    /**
     * Return de la view admin.posts.create
     * qui contient le formulaire d'ajout d'un work
     * @return [type] [description]
     */
    public function create() {
      return view('admin.works.create');
    }

    /**
     * Fonction qui permet de vérifier si les différents champs
     * sont bien remplis et qui crée un nouvel objet de type Work
     * qui est "rempli" par les éléments validés précedemment
     * Quand tout cela est fait, return sur la page de gestion des works (admin.works.index)
     * @param  Request $request [elements envoyés depuis le formulaire]
     * @return [type]           [description]
     */
    public function store(Request $request) {
      $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable',
        'inSlider' => 'required',
        'client_id' => 'required'
      ]);
      $work = Work::create($request->all());
      $work->tags()->attach($request->tags);
      return redirect()->route('admin.works.index');
    }

    /**
     * Return de la view admin.works.edit
     * qui contient le formulaire d'édition d'un work
     * @param  Work   $work [description]
     * @return [type]       [description]
     */
    public function edit(Work $work) {
      return view('admin.works.edit', compact('work'));
    }

    /**
     * Fonction qui permet de vérifier si les différents champs
     * sont bien remplis et qui update un objet existant de type Work
     * qui est "re-rempli" par les éléments validés précedemment
     * Quand tout cela est fait, return sur la page de gestion des works (admin.works.index)
     * @param  Request $request [elements envoyés depuis le formulaire]
     * @param  Work    $work    [description]
     * @return [type]           [description]
     */
    public function update(Request $request, Work $work) {
      $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable',
        'inSlider' => 'required',
        'client_id' => 'required'
      ]);
      $work->update($request->all());
      $work->tags()->sync($request->tags);
      return redirect()->route('admin.works.index');
    }

    /**
     * Fonction qui permet la suppression d'un objet existant de type Work
     * et return sur la page de gestion des works (admin.posts.index)
     * @param  Work   $work [description]
     * @return [type]       [description]
     */
    public function delete(Work $work) {
      $work->tags()->detach();
      $work->delete();
      return redirect()->route('admin.works.index');
    }

}
