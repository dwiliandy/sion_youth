@extends('layouts.admin.app',[
    'title' =>'Kelompok'
])

@section('content')
<div class="container-fluid">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kelompok</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
    @can('super admin')
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Kelompok</h6>
      </div>
    @endcan
      <div class="row ml-4 mt-3">
        <button type="button" data-toggle="tooltip" data-placement="top" title="Tambah Data" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modal-create">
          <i class="fas fa-plus"></i>
        </button>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Nama</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($sectors as $sector)
                    <tr>
                      <td>{{ ucwords($sector->name) }}</td>
                      <td>
                        @if(Gate::check($sector->name) || Gate::check('super admin'))
                          <a href="{{ route('get-schedule', ['sector' => Hashids::encode($sector->id)]) }}"  data-toggle="tooltip" data-placement="top" title="Lihat Jadwal" class="badge bg-info"><i class="fas fa-calendar"></i></a>
                        @endif
                        @can('super admin')
                          <button type="button" class="badge bg-warning border-0 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit Data"  data-id="{{ Hashids::encode($sector->id) }}" data-bs-toggle="modal" data-bs-target="#modal-edit">
                            <i class="fas fa-edit"></i>
                          </button>
                          <form action="{{ route('admin.sectors.destroy', ['sector' => Hashids::encode($sector->id)]) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="badge bg-danger border-0" data-toggle="tooltip" data-placement="top" title="Hapus Data"  onclick="return confirm('Yakin untuk menghapus data')"><i class="fas fa-eraser"></i></button>
                          </form>
                        @endcan
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
          {{-- Modal Create --}}
          <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-create" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                      <h3 class="font-weight-bolder text-info text-gradient">Tambah Kelompok</h3>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.sectors.store') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="form-group">
                            <label>Nama Kelompok</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" required name="name">
                            </div>
                          </div>
                          </div>
                          
                        </div>
                        <div class="text-center pb-4">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Modal Edit --}}
          <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                      <h3 class="font-weight-bolder text-info text-gradient">Edit Kelompok</h3>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.sector.update-data') }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                          <div class="form-group">
                            <label>Nama Kelompok</label>
                            <div class="input-group mb-3">
                              <input type="hidden" class="form-control" required name="id" id="id">
                              <input type="text" class="form-control" required name="name" id="name">
                            </div>
                          </div>
                          </div>
                          
                        </div>
                        <div class="text-center pb-4">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>

  @push('js')
  <script>
    $('body').on("click", ".btn-edit", function () {
      var id = $(this).attr("data-id");
      $.ajax({
        url: "/admin/sectors/"+ id + "/edit",
        method: "GET",
        success: function (response) {
          $("#modal-edit").modal("show");
          $("#name").val(response[0].name);
          $("#id").val(response[0].id);
        }
      });
    });
  </script>
  @endpush
@endsection
