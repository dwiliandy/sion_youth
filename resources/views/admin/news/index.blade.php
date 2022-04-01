@extends('layouts.admin.app',[
    'title' =>'Berita'
])

@section('content')
<div class="container-fluid">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Berita</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Berita</h6>
      </div>
      <div class="row ml-4 mt-3">
        <a href="{{ route('admin.news.create') }}" data-toggle="tooltip" data-placement="top" title="Tambah Data"  class="btn btn-primary btn-circle"><i class="fas fa-plus"></i></a>
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
                        <a href="{{ route('admin.news.show', ['news' => $news->id]) }}" class="badge bg-info" data-toggle="tooltip" data-placement="top" title="Lihat Data" ><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Edit Data" ><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.news.destroy', ['news' => $news->id]) }}" method="post" class="d-inline">
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
