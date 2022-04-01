@extends('layouts.admin.app',[
    'title' =>'Daftar Admin'
])

@section('content')
<div class="container-fluid">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Admin</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Admin</h6>
      </div>
      <div class="row ml-4 mt-3">
        <a href="{{ route('admin.users.create') }}" data-toggle="tooltip" data-placement="top" title="Tambah Data" class="btn btn-primary btn-circle"><i class="fas fa-plus"></i></a>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit Data"  class="badge bg-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="badge bg-danger border-0"  data-toggle="tooltip" data-placement="top" title="Hapus Data" onclick="return confirm('Yakin untuk menghapus data')"><i class="fas fa-eraser"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

  @push('js')
  
  @endpush
@endsection
