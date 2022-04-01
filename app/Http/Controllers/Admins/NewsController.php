<?php

namespace App\Http\Controllers\Admins;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Torann\Hashids\Facade\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
  public function __construct()
  {
      $this->middleware('can:super admin');
  }
     public function index(){
      $newses = News::all();
      return view('admin.news.index', compact(['newses']));
    }

    public function show($id){
      $news = News::find(Hashids::decode($id)[0]);
      return view('admin.news.show', compact(['news']));
    }

    public function create(){
      return view('admin.news.create');
    }

    public function store(Request $request){

      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'image' => 'image',
      ],
      [
          'title.required' => 'Judul harus diisi',
          'body.required' => 'Isi Tulisan harus diisi',
          'image.image' => 'File harus berbentuk gambar'
      ]);

      if($request->file('image')){
        $validatedData['image'] = $request->file('image')->store('news');
      }

      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

      News::create($validatedData);
      return redirect()->route('admin.news.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id){
      $news = News::find(Hashids::decode($id)[0]);
      return view('admin.news.edit', compact(['news']) );
    }

    public function update(Request $request, News $news){
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'image' => 'image',
      ],
      [
          'title.required' => 'Judul harus diisi',
          'body.required' => 'Isi Tulisan harus diisi',
          'image.image' => 'File harus berbentuk gambar'
      ]);

      if($request->file('image')){
        if($news->image){
          Storage::delete($news->image);
        }
        $validatedData['image'] = $request->file('image')->store('news');
      }
      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

      $news->update($validatedData);
      return redirect()->route('admin.news.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
      $news = News::find(Hashids::decode($id)[0]);
      if($news->image){
        Storage::delete($news->image);
      }
      News::destroy($news->id);
      return redirect()->route('admin.news.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
