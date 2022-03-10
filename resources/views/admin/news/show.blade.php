@extends('layouts.admin.app',[
    'title' =>'Detail Berita'
])

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 mt-2 mb-2">
      <div class="card dashboard service-section mt-2 d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h1>{{ ucwords($news->title) }}</h1>
          <div class="d-sm-flex align-items-start mb-4">
            <a href="{{ route('admin.news.show', ['news' => $news->id]) }}" class="btn btn-success mr-1  btn-sm"><i class="fas fa-long-arrow-alt-left"> Kembali ke halaman awal</i></a>
            <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" class="btn btn-warning mr-1  btn-sm"><i class="fas fa-edit"> Edit</i></a>
            <form action="{{ route('admin.news.destroy', ['news' => $news->id]) }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-danger  btn-sm" onclick="return confirm('Yakin untuk menghapus data')"><i class="fas fa-eraser"> Hapus</i></button>
            </form>
        </div>
          <hr>
            @if ($news->image)
              <img src="{{ asset('storage/'. $news->image) }}" alt="">
            @endif
            <p class="mt-3">{!! $news->body !!}</p>
        </div>
      </div>
    </div>
  </div>
</div>

  @push('js')

  @endpush
@endsection
