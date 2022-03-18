@extends('layouts.app',[
'title' =>'Detail Berita'
])

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-2 mb-2">
        <div class="card dashboard service-section mt-2 d-flex justify-content-around">
          <div class="card-body d-flex flex-column dashboard-card">
            <nav aria-label="breadcrumb" class="mb-1" style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('root') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ ucwords($news->title) }}</li>
              </ol>
            </nav>
            <h1 class="text-center">{{ ucwords($news->title) }}</h1>
            <p class="text-center">{{ Carbon\Carbon::parse($news->created_at)->isoFormat('dddd, D MMMM Y') }}</p>
                @if ($news->image)
                    <img class="img-fluid" src="{{ asset('storage/'. $news->image) }}" alt="">
                @endif
                <p class="mt-3">{!! $news->body !!}</p>
                <a href="{{ route('root') }}"><i class="fas fa-long-arrow-alt-left"> Kembali ke halaman awal</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection