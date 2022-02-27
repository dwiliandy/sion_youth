<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
    }

    public function create(){
      $categories = Category::all();
      return view('posts.create', compact('categories'));
    }

    public function store(Request $request){
      Post::create($request->all());

      return redirect()->route('root')->with('success', 'Data berhasil ditambahkan!');
    }
}
