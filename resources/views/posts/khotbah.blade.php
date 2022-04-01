@extends('layouts.app',[
'title' =>'Khotbah'
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
                            <li class="breadcrumb-item active" aria-current="page">Khotbah</li>
                        </ol>
                    </nav>
                    <h5 class="home text-center">KHOTBAH</h5>
                    <div class="row justify-content-center">
                        @if ($khotbahs->count() > 0)
                        <div class="card mb-3">
                            @if ($khotbahs[0]->image)
                            <div class="img-hover-zoom">
                                <a href="{{ route('posts.show', ['post' => $khotbahs[0]->id]) }}">
                                    <img src="{{ asset('storage/'. $khotbahs[0]->image) }}" class="card-img-top">
                                </a>
                            </div>
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{ route('posts.show', ['post' => $khotbahs[0]->id]) }}"
                                        class="text-decoration-none text-dark">{{ ucwords($khotbahs[0]->title) }}</a>
                                </h5>
                                <small>{{ Carbon\Carbon::parse($khotbahs[0]->published_at)->isoFormat('dddd, D MMMM Y') }}</small>
                                <p class="card-text pt-2">{{$khotbahs[0]->excerpt}}</p>
                                <a href="{{ route('posts.show', ['post' => $khotbahs[0]->id]) }}"
                                    class="btn btn-login">Baca Selengkapnya</a>
                            </div>
                        </div>
                        <div class="row justify-content-start">
                            @foreach ($khotbahs->skip(1) as $khotbah)
                            <div class="col-lg-4  pt-2">
                                <div class="card">
                                    @if ($khotbah->image)
                                    <div class="img-hover-zoom">
                                        <a href="{{ route('posts.show', ['post' => Hashids::encode($khotbah->id)]) }}">
                                            <img src="{{ asset('storage/'. $khotbah->image) }}" class="card-img-top">
                                        </a>
                                    </div>
                                    @else
                                    <div class="img-hover-zoom">
                                      <a href="{{ route('posts.show', ['post' => Hashids::encode($khotbah->id)]) }}">
                                        <img src="{{ asset('sion-1.jfif') }}" class="card-img-top">
                                      </a>
                                    </div>
                                    @endif
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><a
                                                href="{{ route('posts.show', ['post' => Hashids::encode($khotbah->id)]) }}"
                                                class="text-decoration-none text-dark">{{ ucwords($khotbah->title) }}</a>
                                        </h5>
                                        <small>{{ Carbon\Carbon::parse($khotbah->published_at)->isoFormat('dddd, D MMMM Y') }}</small>
                                        <p class="card-text pt-2">{{$khotbah->excerpt}}</p>
                                        <a href="{{ route('posts.show', ['post' => Hashids::encode($khotbah->id)]) }}"
                                            class="btn btn-login">Baca Selengkapnya</a>
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
</div>
@endsection
