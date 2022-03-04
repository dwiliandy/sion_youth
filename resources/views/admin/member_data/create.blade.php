@extends('layouts.admin.app',[
    'title' =>'Tambah Anggota'
])

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 mt-2 mb-2">
      <div class="card dashboard service-section mt-2 d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h5 class="home">Tambah Anggota</h5>
          <div class="row justify-content-center">
            <form action="{{ route('admin.member_datas.store') }}" method="post">
              @csrf
              <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" id="name" autofocus value="{{ old('name') }}">
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Nama Keluarga</label>
                    <input type="text" class="form-control @error('family_name') is-invalid @enderror" name="family_name" id="family_name" value="{{ old('family_name') }}">
                    @error('family_name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" id="id_number" value="{{ old('id_number') }}">
                    @error('id_number')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label">Jenis Kelamin</label>
                  <select class="form-control" name="sex" required id="sex">
                    @if (old('sex') == 'female')
                      <option value="male">Pria</option>
                      <option value="female" selected>Wanita</option>
                    @else
                      <option value="male" selected>Pria</option>
                      <option value="female" >Wanita</option>
                    @endif
                  </select>
                  @error('sex')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-md-6" >
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" id="birth_place" value="{{ old('birth_place') }}">
                    @error('birth_place')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" id="birth_date" value="{{ old('birth_date') }}">
                    @error('birth_date')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Kolom</label>
                    <select class="form-control" name="group" required id="group">
                      @foreach ($groups as $group)
                      @if (old('group') == $group->name)
                      <option value="{{ $group->name }}" selected>{{ ucwords($group->name) }}</option>
                      @else
                      <option value="{{ $group->name }}">{{ ucwords($group->name) }}</option>
                      @endif
                      @endforeach
                    </select>
                    @error('group')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Baptis</label>
                    <select class="form-control" name="baptize" required id="baptize">
                      @if (old('baptize') == 'already')
                        <option value="already" selected>Sudah</option>
                        <option value="not_yet">Belum</option>
                      @else
                        <option value="already">Sudah</option>
                        <option value="not_yet" selected>Belum</option>
                      @endif
                    </select>
                    @error('baptize')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Sidi</label>
                    <select class="form-control" name="sidi" required id="sidi">
                      @if (old('sidi') == 'already')
                        <option value="already" selected>Sudah</option>
                        <option value="not_yet">Belum</option>
                      @else
                        <option value="already">Sudah</option>
                        <option value="not_yet" selected>Belum</option>
                      @endif
                    </select>
                    @error('sidi')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
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

  @endpush
@endsection
