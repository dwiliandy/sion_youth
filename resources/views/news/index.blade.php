@extends('layouts.app',[
'title' =>'Berita'
])

@push('css')
<style>
  .card-img-top{
    max-height: 400px
  }

</style>
@endpush

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-2 mb-2">
        <div class="card dashboard service-section mt-2 d-flex justify-content-around">
          <div class="card-body d-flex flex-column dashboard-card">
            <nav aria-label="breadcrumb" class="mb-1" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('root') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
              </ol>
            </nav>
            <h5 class="home text-center mb-4">DAFTAR BERITA</h5>
            @if ($newses->count() > 0)
            <div class="card mb-3">
              @if ($newses[0]->image)
              <div class="img-hover-zoom">
                <a href="{{ route('news.show', ['news' => Hashids::encode($newses[0]->id)]) }}">
                  <img src="{{ asset('storage/'. $newses[0]->image) }}" class="card-img-top" >
                </a>
              </div>
              @endif
              <div class="card-body text-center">
                <h5 class="card-title"><a href="{{ route('news.show', ['news' => Hashids::encode($newses[0]->id)]) }}" class="text-decoration-none text-dark">{{ ucwords($newses[0]->title) }}</a></h5>
                <small>{{ Carbon\Carbon::parse($newses[0]->created_at)->isoFormat('dddd, D MMMM Y') }}</small>
                <p class="card-text pt-2">{{$newses[0]->excerpt}}</p>
                <a href="{{ route('news.show', ['news' => Hashids::encode($newses[0]->id)]) }}" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
            <div class="row justify-content-start">
                @foreach ($newses->skip(1) as $news)
                <div class="col-lg-4  pt-2">
                  <div class="card">
                    @if ($news->image)
                    <div class="img-hover-zoom">
                      <a href="{{ route('news.show', ['news' => Hashids::encode($news->id)]) }}">
                        <img src="{{ asset('storage/'. $news->image) }}" class="card-img-top" >
                      </a>
                    </div>
                    @else
                      <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body text-center">
                      <h5 class="card-title"><a href="{{ route('news.show', ['news' => Hashids::encode($news->id)]) }}" class="text-decoration-none text-dark">{{ ucwords($news->title) }}</a></h5>
                      <small>{{ Carbon\Carbon::parse($news->created_at)->isoFormat('dddd, D MMMM Y') }}</small>
                      <p class="card-text pt-2">{{$news->excerpt}}</p>
                      <a href="{{ route('news.show', ['news' => Hashids::encode($news->id)]) }}" class="btn btn-login">Baca Selengkapnya</a>
                    </div>
                  </div>
                </div>
                @endforeach
              @else
                <p class="text-center"><strong>Tidak ada Data</strong></p>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection