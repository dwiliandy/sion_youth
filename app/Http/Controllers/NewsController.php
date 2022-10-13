<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Torann\Hashids\Facade\Hashids;

class NewsController extends Controller
{
    public function index(){
      $newses = News::latest()->get();
      return view('news.index', compact('newses'));
    }

    public function show($id){
      $news = News::find($id);
        $post_url = route('news.show', ['news' => $news->id]);
        $title = ucwords($news->title);
        $post_excerpt = $news->excerpt;
        if($news->image) {
          $post_image = $news->image;
        }else{
          $post_image = "";
        }
      return view('news.show', compact('news','post_image','post_excerpt','title','post_url'));
    }
}
