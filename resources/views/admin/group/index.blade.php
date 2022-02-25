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
      </div>
  </div>

</div>

<script>
  
</script>

@endsection
