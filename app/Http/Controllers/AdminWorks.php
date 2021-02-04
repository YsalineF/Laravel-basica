<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class AdminWorks extends Controller
{
    public function index() {
      $works = Work::orderBy('created_at', 'DESC')
                    ->get();
      return view('admin.works.index', compact('works'));
    }
}
