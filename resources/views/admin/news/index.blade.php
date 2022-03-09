@extends('layouts.admin.app',[
    'title' =>'Berita'
])

@section('content')
<div class="container-fluid">

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Berita</h6>
      </div>
      <div class="row ml-4 mt-3">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-circle"><i class="fas fa-plus"></i></a>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Judul</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($newses as $news)
                    <tr>
                      <td>{{ $news->title }}</td>
                      <td>
                        <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" class="badge bg-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.news.destroy', ['news' => $news->id]) }}" method="post" class="d-inline">
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
