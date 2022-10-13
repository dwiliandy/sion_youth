<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Torann\Hashids\Facade\Hashids;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
  public function __construct()
  {
      $this->middleware('can:super admin');
  }
    public function index(){
      $posts = Post::orderBy('created_at','desc')->with('category')->get();
      return view('admin.post.index', compact(['posts']));
    }
    
    public function show($id){
      $post = Post::find($id);
      return view('admin.post.show', compact(['post']));
    }

    public function edit($id){
      $post = Post::find($id);
      $categories = Category::all();
      return view('admin.post.edit', compact(['post','categories']));
    }

    public function update(Request $request, Post $post){
      
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'author' => 'max:255',
        'category_id' => 'required',
        'body' => 'required',
        'image' => 'image'
      ],
      [
          'title.required' => 'Judul harus diisi',
          'body.required' => 'Isi Tulisan harus diisi',
          'title.max' => 'Judul maksimal 255 karakter',
          'author.max' => 'Penulis maksimal 255 karakter',
          'image.image' => 'File harus berbentuk gambar'
      ]);

      if($request->file('image')){
        if($post->image){
          Storage::delete($post->image);
        }
        $validatedData['image'] = $request->file('image')->store('post');
      }

      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

      Post::where('id', $post->id)->update($validatedData);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id){
      $post = Post::find($id);
      if($post->image){
        Storage::delete($post->image);
      }
      Post::destroy($post->id);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil dihapus']);
    }

    public function publishData($id){
      $post = Post::find($id);
      $post->update(['published' => true, 'published_at' => Carbon::now()]);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil diperbarui']);
    }

    public function unpublishData($id){
      $post = Post::find($id);
      $post->update(['published' => false, 'published_at' => null]);
      return redirect()->route('admin.posts.index')->with(['success' => 'Data berhasil diperbarui']);
    }

  }
  