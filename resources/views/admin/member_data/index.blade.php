@extends('layouts.admin.app',[
    'title' =>'Daftar Anggota'
])

@section('content')
<div class="container-fluid">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="d-flex">
            <a href="{{ route('admin.member_datas.create') }}" data-toggle="tooltip" data-placement="top" title="Tambah Data"  class="my-3 btn btn-primary btn-circle"><i class="fas fa-plus"></i></a>
            <div class="my-3 ml-auto ">
              <a href="{{ route('import_member_data.index') }}" data-toggle="tooltip" data-placement="top" title="Import dari Excel"  class="btn btn-primary btn-circle"><i class="fas fa-file-import"></i></a>
              <a href="{{ route('export_member_data.export') }}" data-toggle="tooltip" data-placement="top" title="Export ke Excel"  class="btn btn-info btn-circle"><i class="fas fa-file-export"></i></a>
            </div>
          </div>
        </div>
          <div class="table-responsive">
            
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Nama Keluarga</th>
                          <th>Jenis Kelamin</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Kolom</th>
                          <th>Baptis</th>
                          <th>Sidi</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($member_datas as $member_data)
                    
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $member_data->name }}</td>
                      <td>{{ $member_data->family_name }}</td>
                      <td>
                        @if ($member_data->sex == 'male')
                          Pria
                        @else
                          Wanita
                        @endif
                      </td>
                      <td>{{ $member_data->birth_place }}</td>
                      <td>{{ Carbon\Carbon::parse($member_data->birth_date)->isoFormat('D MMMM Y') }}</td>
                      <td>{{ $member_data->kolom }}</td>
                      <td>
                        @if ($member_data->baptize == 'already')
                          Sudah
                        @else
                          Belum
                        @endif
                      </td>
                      <td>
                        @if ($member_data->sidi == 'already')
                          Sudah
                        @else
                          Belum
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('admin.member_datas.edit', ['member_data' => $member_data->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit Data" class="badge bg-warning"><i class="fas fa-edit"></i></a>
                        @if ($member_data->is_active == 1)
                        <form action="{{ route('admin.member_datas.is-active', ['member_data' => $member_data->id]) }}" method="post" class="d-inline">
                          @csrf
                            <button class="badge bg-success border-0" data-toggle="tooltip" data-placement="top" title="Nonaktifkan Data" onclick="return confirm('Yakin untuk menonaktifkan anggota')"><i class="fas fa-check-circle"></i></button>
                        </form>
                        @else
                        <form action="{{ route('admin.member_datas.is-active', ['member_data' => $member_data->id]) }}" method="post" class="d-inline">
                          @csrf
                          <button class="badge bg-danger border-0" data-toggle="tooltip" data-placement="top" title="Aktifkan Data" onclick="return confirm('Yakin untuk mengaktifkan anggota')"><i class="fas fa-times-circle"></i></button>
                        </form>
                        @endif
                        <form action="{{ route('admin.member_datas.destroy', ['member_data' => $member_data->id]) }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="badge bg-danger border-0" data-toggle="tooltip" data-placement="top" title="Hapus Data"  onclick="return confirm('Yakin untuk menghapus data')"><i class="fas fa-eraser"></i></button>
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
