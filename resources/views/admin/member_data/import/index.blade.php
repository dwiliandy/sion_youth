@extends('layouts.admin.app',[
    'title' =>'Import Data Anggota'
])

@push('css')
  <style>
    table.table-bordered{
      border:1px solid black;
      margin-top:20px;
    }
    table.table-bordered > thead > tr > th{
        border:1px solid black;
    }
    table.table-bordered > tbody > tr > td{
        border:1px solid black;
    }
  </style>
@endpush

@section('content')
<div class="container-fluid">
  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.member_datas.index') }}">Data Anggota</a></li>
      <li class="breadcrumb-item active" aria-current="page">Import Data</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}
  
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Import Data Anggota</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <p> Catatan: Gunakan Template Di Bawah</p>
          </div>
          <div class="col-lg-6 my-2">
            <a class= "btn btn-success" href="{{ route('download-member-data') }}" ><i class="fas fa-download"> Download Template Excel</i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h3 style ="color: red">Perhatikan!!</h3>
          </div>
          <div class="col-12">
            <ul style ="color: red">
              <li>Jenis Kelamin diisi dengan 'P' atau 'L'</li>
              <li>Pastikan tanggal lahir di Excel format date dengan format DD/MM/YYYY</li>
              <li>Baptis disi dengan 'sudah-baptis' atau 'belum-baptis'</li>
              <li>Sidi dan Baptis Diisi dengan : Sudah atau Belum</li>
              <li>Sidi disi dengan 'sudah-sidi' atau 'belum-sidi'</li>
            </ul>
          </div>
        </div>
        <form action="{{ route('import_member_data') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row">
              <div class="col-md-6">
                @error('file')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="file" name="file" class="form-control  @error('file') is-invalid @enderror" required>
                <small style ="color: red">Ekstensi file harus .xlsx atau .xls</small>
              </div>
            </div>
          <br>
          <button class="btn btn-success">Submit</button>
          <div class="mt-2">
            @if (session()->get('failures'))
            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                  <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Error!</h4>
                      <table class="table table-bordered" >
                        <thead>
                          <tr>
                            <th>
                              Baris
                            </th>
                            <th>
                              Error Deskripsi
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(session()->get('failures') as $errors)
                          <tr>
                            <td>
                              {{ $errors->row() }}
                            </td>
                            <td>
                              @foreach ($errors->errors() as $error)
                                {{ $error }} 
                              @endforeach
                            </td>
                          </tr>
                          @endforeach  
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
            @endif
          </div>
      </form>
      </div>
  </div>
</div>

  @push('js')
  
  @endpush
@endsection
