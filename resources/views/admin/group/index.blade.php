@extends('layouts.admin.app',[
    'title' =>'Admin Dashboard'
])

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Kolom</h1>
  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Kolom</h6>
      </div>
      <div class="row ml-4 mt-3">
        <button type="button" class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modal-create">
          <i class="fas fa-edit"></i>
        </button>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Kolom</th>
                          <th>Jumlah Anggota</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($groups as $group)
                      <tr>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->member_count() }}</td>
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
                      <h3 class="font-weight-bolder text-info text-gradient">Tambah/Hapus Kolom</h3>
                    </div>
                    <div class="card-body">
                      <form role="form text-left" id="createForm">
                        <div class="row">
                          <div class="col-md-6">
                            <label>Action</label>
                            <div class="input-group mb-3">
                              <select class="form-control" name="action" required>
                                <option value="" disabled selected>--Pilih--</option>  
                                  <option value="Add">Tambah</option>
                                  <option value="Destroy">Hapus</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label>Jumlah Kolom (1..10)</label>
                            <div class="input-group mb-3">
                              <select class="form-control" name="total" required>
                                <option value="" disabled selected>--Pilih--</option>  
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                              </select>
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
  $("#createForm").on("submit", function (e) {
      let formData = new FormData(this);
      e.preventDefault();
      console.log(formData);
      $.ajax({
        url: "/admin/group/edit",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: (response) => {
         console.log(response)
        }
      });
    });
</script>
  
@endpush
@endsection
