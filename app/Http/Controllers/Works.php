<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class Works extends Controller
{

    public function index(INT $limit = 6) {
      $works = Work::orderBy('created_at', 'DESC')
                      ->take($limit)
                      ->get();
      return view('works.index', compact('works'));
    }

    public function more(Request $request) {
      $limit = (isset($request->limit)) ? $request->limit : 10;

      $works = Work::orderBy('created_at', 'DESC')
                      ->take($limit)
                      ->offset($request->offset)
                      ->get();
      return view('works._list', compact('works'));
    }
}
