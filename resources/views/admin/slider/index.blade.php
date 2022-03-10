@extends('layouts.admin.app',[
    'title' =>'Slider'
])

@section('content')
<div class="container-fluid">

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Berita</h6>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modal-create">
          <i class="fas fa-plus"></i>
        </button>
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Gambar</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                      <td><img src="{{ asset('storage/'. $slider->image) }}" class="img-fluid col-sm-5 mb-3 d-block"></td>
                      <td>
                        <a href="{{ route('admin.slider.edit', ['slider' => $slider->id]) }}" class="badge bg-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.slider.destroy', ['slider' => $slider->id]) }}" method="post" class="d-inline">
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
          <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-create" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal- " role="document">
              <div class="modal-content">
                <div class="modal-body p-0">
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                      <h3 class="font-weight-bolder text-info text-gradient">Tambah Slide</h3>
                    </div>
                    <div class="card-body">
                      <form action="#" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <label>Gambar</label>
                            <div class="input-group mb-3">
                              <input class="form-control" type="file" id="image" name="image">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label>Aktif</label>
                            <div class="input-group mb-3">
                              <select class="form-control" name="action" id="active" required  onchange="chooseType()">
                                <option value="" disabled selected>--Pilih--</option>  
                                  <option value="true">Aktif</option>
                                  <option value="false">Tidak Aktif</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group" id="order" style="display:none">
                              <label>Urutan</label>
                              <div class="input-group mb-3">
                                <select class="form-control" name="order" >
                                    <option value="" disabled selected>--Pilih--</option>  
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
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
    function chooseType() {
      var action = document.getElementById('active').value;
      if(action=="true"){
        document.getElementById('order').style.display = 'block';
      }else{
        document.getElementById('order').style.display = 'none';
      }
    }
  </script>
  @endpush
@endsection
