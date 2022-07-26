@extends('layouts.admin.app',[
    'title' =>'Detail Post'
])

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 mt-2 mb-2">
      <div class="card dashboard service-section mt-2 d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h1>{{ ucwords($post->title) }}</h1>
          <div class="d-sm-flex align-items-start mb-4">
            <a href="{{ route('admin.posts.index' ) }}" class="btn btn-success mr-1  btn-sm"><i class="fas fa-long-arrow-alt-left"> Kembali ke halaman awal</i></a>
            <a href="{{ route('admin.posts.edit', ['post' => Hashids::encode($post->id)]) }}" class="btn btn-warning mr-1  btn-sm"><i class="fas fa-edit"> Edit</i></a>
            @if (!$post->published)
              <form action="{{ route('publish-data', ['post' => Hashids::encode($post->id)]) }}" method="post" class="d-inline">
                @csrf
                <button class="btn btn-success mr-1  btn-sm" onclick="return confirm('Yakin untuk publish data')"><i class="fas fa-check-circle"> Publish</i></button>
              </form>
            @else
            <form action="{{ route('unpublish-data', ['post' => Hashids::encode($post->id)]) }}" method="post" class="d-inline">
              @csrf
              <button class="btn btn-danger mr-1  btn-sm" onclick="return confirm('Yakin untuk unpublish data')"><i class="fas fa-times-circle"> Unpublish</i></button>
            </form>
            @endif
            <form action="{{ route('admin.posts.destroy', ['post' => Hashids::encode($post->id)]) }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-danger  btn-sm" onclick="return confirm('Yakin untuk menghapus data')"><i class="fas fa-eraser"> Hapus</i></button>
            </form>
        </div>
          <hr>
            @if ($post->image)
              <img src="{{ asset('storage/'. $post->image) }}" alt="">
            @endif
            <p class="mt-3">{!! $post->body !!}</p>
        </div>
      </div>
    </div>
  </div>
</div>

  @push('js')

  @endpush
@endsection
