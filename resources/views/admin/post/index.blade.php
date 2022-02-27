@extends('layouts.admin.app',[
    'title' =>'Post'
])

@section('content')
<div class="container-fluid">

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
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="badge bg-warning"><i class="fas fa-edit"></i></a>
                        @if (!$post->published)
                          <a href="{{ route('approve-data', ['post' => $post->id]) }}" class="badge bg-success"><i class="fas fa-check-circle"></i></a>
                        @endif
                        <a href="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" class="badge bg-danger"><i class="fas fa-eraser"></i></a>
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
