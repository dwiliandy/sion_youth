@extends('layouts.admin.app',[
    'title' =>'Jadwal Ibadah'
])

@section('content')
<div class="container-fluid">

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Jadwal Ibadah {{ $sector_name }}</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="d-flex">
            <a href="{{ route('admin.schedules.create', ['sector' => $sector]) }}" data-toggle="tooltip" data-placement="top" title="Tambah Data"   class="btn btn-primary btn-circle"><i class="fas fa-plus"></i></a>
            <a href="{{ route('import_schedule.index',['sector' => $sector]) }}" data-toggle="tooltip" data-placement="top" title="Import Data" class="my-3 ml-auto btn btn-primary btn-circle"><i class="fas fa-file-import"></i></a>
          </div>
        </div>
          <div class="table-responsive">
              <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Hari/Tanggal</th>
                          <th>Waktu Ibadah</th>
                          <th>Tempat Ibadah</th>
                          <th>Atas Nama</th>
                          <th>Kolom</th>
                          <th>Khadim</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                      <td>{{ Carbon\Carbon::parse($schedule->date)->isoFormat('dddd, D MMMM Y') }}</td>
                      <td>{{ Carbon\Carbon::parse($schedule->time)->isoFormat('HH:mm') }}</td>
                      <td>{{ $schedule->family_name }}</td>
                      <td>{{ $schedule->name }}</td>
                      <td>{{ $schedule->group }}</td>
                      <td>{{ $schedule->preacher }}</td>
                      <td>
                        <a href="{{ route('admin.schedules.edit', ['schedule' => $schedule->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit Data" class="badge bg-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.schedules.destroy', ['schedule' => $schedule->id]) }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="badge bg-danger border-0" data-toggle="tooltip" data-placement="top" title="Hapus Data" onclick="return confirm('Yakin untuk menghapus data')"><i class="fas fa-eraser"></i></button>
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
<script>
  $('#data').DataTable( {
  "language": {
    "paginate": {
      "first": "Awal",
      "previous": "Sebelumnya",
      "next": "Berikutnya",
      "last": "Akhir"
    },
          "lengthMenu": "Menampilkan _MENU_ Entri",
          "zeroRecords": "Data tidak ditemukan",
          "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
          "infoEmpty": "Tidak ada data",
          "infoFiltered": "(disaring dari _MAX_ total data)",
          "search": "Cari :"
      },
      "pagingType": "full_numbers",
      "ordering" : false
} );
    $('body').on("click", ".btn-edit", function () {
      var id = $(this).attr("data-id");
      $.ajax({
        url: "/admin/sectors/"+ id + "/edit",
        method: "GET",
        success: function (response) {
          $("#modal-edit").modal("show");
          $("#name").val(response.name);
        }
      });
    });
  </script>
  @endpush
@endsection
