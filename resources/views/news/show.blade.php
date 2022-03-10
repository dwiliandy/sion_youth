@extends('layouts.app',[
'title' =>'Detail Berita'
])

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-2 mb-2">
        <div class="card dashboard service-section mt-2 d-flex justify-content-around">
          <div class="card-body d-flex flex-column dashboard-card">
            <h1>{{ $news->title }}</h1><hr>
                <a href="{{ route('root') }}"><i class="fas fa-long-arrow-alt-left"> Kembali ke halaman awal</i></a>
                @if ($news->image)
                  <img src="{{ asset('storage/'. $news->image) }}" alt="">
                @endif
                <p class="mt-3">{!! $news->body !!}</p>
                <a href="{{ route('root') }}"><i class="fas fa-long-arrow-alt-left"> Kembali ke halaman awal</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection