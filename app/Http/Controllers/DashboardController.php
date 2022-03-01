<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function welcome(){
      $articles = Category::where('name','artikel')->first()->posts->take(6);
      $khotbahs = Category::where('name','khotbah')->first()->posts->take(6);
      return view('welcome',[
        'articles' => $articles,
        'khotbahs' => $khotbahs
      ]);
    }
}
