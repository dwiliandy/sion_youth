<?php

namespace App\Http\Controllers\Admins;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
      $posts = Post::with('category')->get();
    return view('admin.post.index', compact(['posts']));
    }

    public function approveData($post){
      dd($post);
    return view('admin.post.index', compact(['posts']));
    }
}
