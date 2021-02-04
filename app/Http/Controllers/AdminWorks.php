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

    public function create() {
      return view('admin.works.create');
    }

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

    public function edit(Work $work) {
      return view('admin.works.edit', compact('work'));
    }

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

}
