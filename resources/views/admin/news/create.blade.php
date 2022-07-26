@extends('layouts.admin.app',[
    'title' =>'Tambah Berita'
])

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 mt-2 mb-2">
      <div class="card dashboard service-section mt-2 d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h5 class="home">Tambah Berita</h5>
          <div class="row justify-content-center">
            <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label class="form-label">Judul</label>
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                    name="title" id="title" autofocus value="{{ old('title') }}">
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Gambar</label>
                @error('image')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              <img class="img-preview img-fluid col-sm-5 mb-3">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Isi Tulisan</label>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
                <div class="text-center col-md-12">
                  <button type="submit" class="btn btn-lg btn-primary">Buat Data</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 
@push('js')
<script>
  
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';
    const reader = new FileReader();
    reader.readAsDataURL(image.files[0]);
    reader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }


</script>
@endpush

@endsection
