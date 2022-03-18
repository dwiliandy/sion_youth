@extends('layouts.app',[
'title' =>'Detail Artikel atau Khotbah'
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
                @if ($post->category->name == 'artikel')
                  <li class="breadcrumb-item"><a href="{{ route('article') }}">Artikel</a></li>
                  @else
                  <li class="breadcrumb-item"><a href="{{ route('khotbah') }}">Khotbah</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ ucwords($post->title) }}</li>
              </ol>
            </nav>
            <h1 class="text-center">{{ ucwords($post->title) }}</h1>
            <p class="text-center">{{ Carbon\Carbon::parse($post->published_at)->isoFormat('dddd, D MMMM Y') }}</p>
                @if ($post->image)
                  <img src="{{ asset('storage/'. $post->image) }}" class="img-fluid" alt="">
                @endif
                <p class="mt-5 mb-2 link-info fw-bold"> &emsp;Ditulis Oleh
                  @if ($post->author)
                  {{ ucwords($post->author) }}
                  @else
                    Anonim
                  @endif
                  </p>
                <p class="mt-3">{!! $post->body !!}</p>
                <a href="{{ route('root') }}"><i class="fas fa-long-arrow-alt-left"> Kembali ke halaman awal</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection