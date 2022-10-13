@extends('layouts.admin.app',[
    'title' =>'Slider'
])

@section('content')
<div class="container-fluid">

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Slider</h6>
      </div>
      <div class="card-body">
        @if ($sliders->count() < 6)
          <button type="button" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Tambah Data"  data-bs-toggle="modal" data-bs-target="#modal-create">
            <i class="fas fa-plus"></i>
          </button>
        @endif
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Gambar</th>
                          <th>Urutan</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                      
                      <td><img src="{{ asset('storage/'. $slider->image) }}" class="img-fluid col-sm-5 mb-3 d-block"></td>
                      <td>
                        {{ $slider->order }}</td>
                      <td>
                        <button type="button" class="badge bg-warning border-0 btn-edit" data-bs-toggle="modal" data-bs-target="#modal-update" data-id="{{ $slider->id }}">
                          <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('admin.sliders.destroy', ['slider' => $slider->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit Data"  method="post" class="d-inline">
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
          <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-create" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                      <h3 class="font-weight-bolder text-info text-gradient">Tambah Slide</h3>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-9">
                            <label>Gambar</label>
                            <div class="input-group mb-3">
                              <input class="form-control" type="file" id="image" name="image" required>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Urutan</label>
                              <div class="input-group mb-3">
                                <select class="form-control" name="order" required>
                                    <option value="" disabled selected>--Pilih--</option>
                                    @foreach ($differenceArray as $data)
                                      <option value="{{ $data }}">{{ $data }}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
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
          <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="modal-update" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                      <h3 class="font-weight-bolder text-info text-gradient">Edit Urutan</h3>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.sliders.update-data') }}" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="hidden" class="form-control" required name="id" id="id">
                              <label>Urutan</label>
                              <div class="input-group mb-3">
                                <select class="form-control" name="order" id="order" required>
                                 @foreach (range(1,6) as $order)
                                    <option value="{{ $order }}">{{ $order }}</option>
                                @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
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
        url: "/admin/sliders/"+ id + "/edit",
        method: "GET",
        success: function (response) {
          $("#modal-edit").modal("show");
          $("#order").val(response[0].order);
          $("#id").val(response[0].id);
        }
      });
    });
  </script>
  @endpush
@endsection
