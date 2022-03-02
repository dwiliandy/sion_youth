<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index(){
      $posts = Post::with('category')->get();
    return view('admin.post.index', compact(['posts']));
    }
    
    public function show(Post $post){
      return view('admin.post.show', compact(['post']));
    }

    public function publishData(Post $post){
      $post->update(['published' => true, 'published_at' => Carbon::now()]);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function unpublishData(Post $post){
      $post->update(['published' => false, 'published_at' => null]);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function destroy(Post $post){
      Post::destroy($post->id);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
