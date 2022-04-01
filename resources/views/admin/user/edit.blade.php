@extends('layouts.admin.app',[
    'title' =>'Edit Admin'
])

@section('content')
<div class="container-fluid">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}

  <div class="row">
    <div class="col-lg-12 mt-2 mb-2">
      <div class="card dashboard service-section mt-2 d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h5 class="home">Edit Admin</h5>
          <div class="row justify-content-center">
            <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="row">
                <div class="mb-3 col-md-4">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                  name="name" id="name" autofocus value="{{ old('name',$user->name) }}">
                  @error('name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 col-md-4">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror"
                  name="email" id="email" autofocus value="{{ old('email', $user->email) }}">
                  @error('email')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 col-md-4">
                  <label class="form-label">Izin Akses Kelompok</label>
                  <select class="form-control" name="permission" required id="permission">
                    @foreach ($permissions as $permission)
                      @if ($user->permissions)
                        <option value="{{ $permission->name }}">{{ ucwords($permission->name) }}</option>
                      @else
                        @if (old('permission', $user->permissions->first()->name) == $permission->name)
                        <option value="{{ $permission->name }}" selected>{{ ucwords($permission->name) }}</option>
                        @else
                        <option value="{{ $permission->name }}">{{ ucwords($permission->name) }}</option>
                        @endif
                      @endif
                    @endforeach
                </select>
                </div>
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
