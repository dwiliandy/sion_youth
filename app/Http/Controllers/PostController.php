<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
    }
    
    public function show($id){
      $post = Post::find($id);
      return view('posts.show', compact('post'));
    }


    public function create(){
      $categories = Category::all();
      return view('posts.create', compact('categories'));
    }

    public function store(Request $request){
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'author' => 'max:255',
        'category_id' => 'required',
        'body' => 'required'
      ],
      [
          'title.required' => 'Judul harus diisi',
          'body.required' => 'Isi Tulisan harus diisi',
          'title.max' => 'Judul maksimal 255 karakter',
          'author.max' => 'Penulis maksimal 255 karakter',

      ]);
      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
      Post::create($validatedData);
      return redirect()->route('root')->with('success', 'Data berhasil ditambahkan!');
    }

    public function getArticles(){
      $articles = Category::where('name','artikel')->first()->posts->where('published',true);
      return view('posts.article', compact('articles'));

    }
    public function getKhotbah(){
      $khotbahs = Category::where('name','khotbah')->first()->posts->where('published',true);
      return view('posts.khotbah', compact('khotbahs'));

    }
}
