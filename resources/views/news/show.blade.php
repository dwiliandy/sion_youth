@extends('layouts.app')

@push('head')
  <meta property="og:url"           content="{{ $post_url }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{ $title }}" />
  <meta property="og:description"   content="{{ $post_excerpt }}" />
  @if ($post_image != "")
    <meta property="og:image" content="{{ asset('storage/'. $post_image) }}" />
  @else
    <meta property="og:image" content="{{ asset('sion-2.jfif') }}" />
  @endif
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
              <div class="d-flex">
                <div class="px-2">
                  <p class="btn btn-primary" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('{{ route('news.show', ['news' => Hashids::encode($news->id)]) }}'),'facebook-share-dialog','width=626,height=436'); return false;" /><i class="fab fa-facebook"> Bagikan</i></p>
                </div>
                <div class="px-2">
                  <a target="_blank" href="whatsapp://send?text={{ route('news.show', ['news' => Hashids::encode($news->id)]) }}" class="btn btn-success"><i class="fab fa-whatsapp"> Bagikan</i></a>
                </div>
              </div>
                </div>
        </div>
      </div>
    </div>
  </div>
@endsection