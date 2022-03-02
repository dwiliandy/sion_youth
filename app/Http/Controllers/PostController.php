<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
      Post::create($request->all());

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
