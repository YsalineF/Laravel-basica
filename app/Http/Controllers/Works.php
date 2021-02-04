<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class Works extends Controller
{

    /**
     * Fonction qui permet de charger les works présents dans la db
     * dans la variable $works
     * et return de la vue works.index (page portfolio) avec envoi de la variable $works
     * @param  integer $limit [limite du nombre de works à charger]
     * @return [type]         [description]
     */
    public function index(INT $limit = 6) {
      $works = Work::orderBy('created_at', 'DESC')
                      ->take($limit)
                      ->get();
      return view('works.index', compact('works'));
    }

    /**
     * Fonction qui permet de charger plus de works
     * et qui return la vue works._list
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function more(Request $request) {
      $limit = (isset($request->limit)) ? $request->limit : 10;

      $works = Work::orderBy('created_at', 'DESC')
                      ->take($limit)
                      ->offset($request->offset)
                      ->get();
      return view('works._list', compact('works'));
    }

    /**
     * Fonction qui permet de charger un seul work
     * @param  Work   $work [description]
     * @return [type]       [description]
     */
    public function show(Work $work) {
      return view('works.show', compact('work'));
    }
}
