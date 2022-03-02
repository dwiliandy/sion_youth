@extends('layouts.admin.app',[
    'title' =>'Edit Post'
])

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 mt-2 mb-2">
      <div class="card dashboard service-section mt-2 d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h5 class="home">Edit Post</h5>
          <div class="row justify-content-center">
            <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
              @csrf
              @method('patch')
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    @error('title')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" id="title" autofocus value="{{ old('title', $post->title) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    @error('author')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" autofocus value="{{ old('author', $post->author) }}">
                </div>
                <label class="form-label">Kategori</label>
                <div class="input-group mb-3">
                    <select class="form-control" name="category_id" required id="category_id">
                        @foreach ($categories as $category)
                          @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ ucwords($category->name) }}</option>
                          @else
                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                          @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Isi Tulisan</label>
                    @error('body')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <div class="text-center col-md-12">
                  <button type="submit" class="btn btn-lg btn-primary">Update Data</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  @push('js')

  @endpush
@endsection
