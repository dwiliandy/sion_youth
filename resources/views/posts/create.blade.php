@extends('Layouts.app',[
'title' =>'Kontribusi'
])

@section('content')
<div class="container">
  <div class="row justify-content-start mt-3">
    <div class="col-lg-12 mb-2">
      <div class="card dashboard service-section d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h5 class="home">Tambah Post</h5>
          <div class="row justify-content-center">
            <form action="{{ route('posts.store') }}" method="post">
              @csrf
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" required name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="author">
                </div>
                <label class="form-label">Kategori</label>
                <div class="input-group mb-3">
                    <select class="form-control" name="category_id" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Isi Tulisan</label>
                    <input id="body" type="hidden" name="body">
                    <trix-editor input="body"></trix-editor>
                </div>
                <div class="text-center col-md-12">
                  <button type="submit" class="btn btn-lg btn-login">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection