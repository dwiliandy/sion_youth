<?php

namespace App\Http\Controllers\Admins;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
     public function index(){
      $newses = News::all();
      return view('admin.news.index', compact(['newses']));
    }

    public function create(){
      return view('admin.news.create');
    }

    public function store(Request $request){

      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required'
      ],
      [
          'title.required' => 'Judul harus diisi',
          'body.required' => 'Isi Tulisan harus diisi'
      ]);

      News::create($validatedData);
      return redirect()->route('admin.news.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(News $news){
      return view('admin.news.edit', compact(['news']) );
    }

    public function update(Request $request, News $news){

      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required'
      ],
      [
          'title.required' => 'Judul harus diisi',
          'body.required' => 'Isi Tulisan harus diisi'
      ]);

      $news->update($validatedData);
      return redirect()->route('admin.news.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(News $news){
      News::destroy($news->id);
      return redirect()->route('admin.news.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
