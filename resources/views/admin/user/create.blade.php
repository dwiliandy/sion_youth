@extends('layouts.admin.app',[
    'title' =>'Tambah Admin'
])

@section('content')
<div class="container-fluid">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}

  <div class="row">
    <div class="col-lg-12 mt-2 mb-2">
      <div class="card dashboard service-section mt-2 d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h5 class="home">Tambah Admin</h5>
          <div class="row justify-content-center">
            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="mb-3 col-md-4">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                  name="name" id="name" autofocus value="{{ old('name') }}">
                  @error('name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 col-md-4">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror"
                  name="email" id="email" autofocus value="{{ old('email') }}">
                  @error('email')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 col-md-4">
                  <label class="form-label">Izin Akses Kelompok</label>
                  <select class="form-control" name="permission" required id="permission">
                    @foreach ($permissions as $permission)
                      @if (old('permission') == $permission->name)
                      <option value="{{ $permission->name }}" selected>{{ ucwords($permission->name) }}</option>
                      @else
                      <option value="{{ $permission->name }}">{{ ucwords($permission->name) }}</option>
                      @endif
                    @endforeach
                </select>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" id="password" autofocus value="{{ old('password') }}">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation" id="password_confirmation" autofocus value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <p class="text-danger">{{ $message }}</p>
                @enderror
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
