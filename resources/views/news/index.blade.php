@extends('layouts.app',[
'title' =>'Berita'
])

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-2 mb-2">
        <div class="card dashboard service-section mt-2 d-flex justify-content-around">
          <div class="card-body d-flex flex-column dashboard-card">
            <h5 class="home">Daftar Berita</h5>
            <div class="row justify-content-center">
              @if ($newses->count() > 0)
                @foreach ($newses as $news)
                <div class="col-lg-4  pt-2">
                  <div class="card">
                    @if ($news->image)
                        <img src="{{ asset('storage/'. $news->image) }}" class="card-img-top"  alt="">
                    @else
                      <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $news->title }}</h5>
                      <small>{{ date('d-m-y', strtotime($news->created_at)) }}</small>
                      <hr>
                      <p class="card-text">{{$news->excerpt}}</p>
                      <a href="{{ route('news.show', ['news' => $news->id]) }}" class="btn btn-login">Baca Selengkapnya</a>
                    </div>
                  </div>
                </div>
                @endforeach
              @else
                <p class="text-center"><strong>Tidak ada Data</strong></p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection