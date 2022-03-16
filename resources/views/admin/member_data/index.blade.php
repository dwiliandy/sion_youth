@extends('layouts.admin.app',[
    'title' =>'Daftar Anggota'
])

@section('content')
<div class="container-fluid">

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
      </div>
      <div class="row ml-4 mt-3">
        <a href="{{ route('admin.member_datas.create') }}" class="btn btn-primary btn-circle"><i class="fas fa-plus"></i></a>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
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
                      <td>{{ $member_data->group }}</td>
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
                        <a href="{{ route('admin.member_datas.edit', ['member_data' => $member_data->id]) }}" class="badge bg-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.member_datas.is-active', ['member_data' => $member_data->id]) }}" method="post" class="d-inline">
                          @csrf
                          @if ($member_data->is_active)
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin untuk menonaktifkan anggota')"><i class="fas fa-times-circle"></i></button>
                          @else
                          
                            <button class="badge bg-success border-0" onclick="return confirm('Yakin untuk mengaktifkan anggota')"><i class="fas fa-check-circle"></i></button>
                          @endif
                        </form>
                        <form action="{{ route('admin.member_datas.destroy', ['member_data' => $member_data->id]) }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="badge bg-danger border-0" onclick="return confirm('Yakin untuk menghapus data')"><i class="fas fa-eraser"></i></button>
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
