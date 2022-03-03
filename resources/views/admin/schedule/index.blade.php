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
      <div class="row ml-4 mt-3">
        <a href="{{ route('admin.schedules.create', ['sector' => $sector]) }}" class="btn btn-primary btn-circle"><i class="fas fa-plus"></i></a>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <a href="{{ route('admin.schedules.edit', ['schedule' => $schedule->id]) }}" class="badge bg-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.schedules.destroy', ['schedule' => $schedule->id]) }}" method="post" class="d-inline">
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
  <script>
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
