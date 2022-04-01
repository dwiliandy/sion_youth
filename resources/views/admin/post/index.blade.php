@extends('layouts.admin.app',[
    'title' =>'Post'
])

@section('content')
<div class="container-fluid">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Khotbah & Artikel</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Khotbah atau Artikel</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Judul</th>
                          <th>Penulis</th>
                          <th>Kategori</th>
                          <th>Posting</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post)
                    <tr>
                      <td>{{ ucwords($post->title) }}</td>
                      <td>
                      @if ($post->author)
                        {{ ucwords($post->author) }}
                      @else
                        Anonim
                      @endif
                    </td>
                      <td>{{ ucwords($post->category->name) }}</td>

                      <td>
                        @if ($post->published)
                          <span style="color:green">Sudah diposting</span> 
                        @else
                          <span style="color:red"> Belum Diposting</span> 
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('admin.posts.show', ['post' => Hashids::encode($post->id)]) }}" class="badge bg-info" data-toggle="tooltip" data-placement="top" title="Lihat Data" ><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.posts.edit', ['post' => Hashids::encode($post->id)]) }}" class="badge bg-warning" data-toggle="tooltip" data-placement="top" title="Edit Data" ><i class="fas fa-edit"></i></a>
                        @if (!$post->published)
                          <form action="{{ route('publish-data', ['post' => Hashids::encode($post->id)]) }}" method="post" class="d-inline">
                            @csrf
                            <button class="badge bg-success border-0" data-toggle="tooltip" data-placement="top" title="Publish Data"  onclick="return confirm('Yakin untuk publish data')"><i class="fas fa-check-circle"></i></button>
                          </form>
                        @else
                        <form action="{{ route('unpublish-data', ['post' => Hashids::encode($post->id)]) }}" method="post" class="d-inline">
                          @csrf
                          <button class="badge bg-danger border-0" data-toggle="tooltip" data-placement="top" title="Unpublish Data"  onclick="return confirm('Yakin untuk unpublish data')"><i class="fas fa-times-circle"></i></button>
                        </form>
                        @endif
                        <form action="{{ route('admin.posts.destroy', ['post' => Hashids::encode($post->id)]) }}" method="post" class="d-inline">
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
{{-- <script>
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
          $('#createForm').trigger("reset");
          flash("success", response.success);
        }
      });
    });
</script> --}}
  
@endpush
@endsection
