<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
      $newses = News::all();
      return view('news.index', compact('newses'));
    }

    public function show($id){
      $news = News::find($id);
      return view('news.show', compact('news'));
    }
}
