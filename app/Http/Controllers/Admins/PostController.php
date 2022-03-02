<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
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

    public function edit(Post $post){
      $categories = Category::all();
      return view('admin.post.edit', compact(['post','categories']));
    }

    public function update(Request $request, Post $post){
      
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

      // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

      Post::where('id', $post->id)->update($validatedData);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy(Post $post){
      Post::destroy($post->id);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function publishData(Post $post){
      $post->update(['published' => true, 'published_at' => Carbon::now()]);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function unpublishData(Post $post){
      $post->update(['published' => false, 'published_at' => null]);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil diperbarui']);
    }

  }
  