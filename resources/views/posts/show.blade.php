@extends('layouts.app',[
'title' =>'Detail Artikel atau Khotbah'
])

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-2 mb-2">
        <div class="card dashboard service-section mt-2 d-flex justify-content-around">
          <div class="card-body d-flex flex-column dashboard-card">
            <h1>{{ $post->title }}</h1><hr>
                <a href="{{ route('root') }}"><i class="fas fa-long-arrow-alt-left"> Kembali ke halaman awal</i></a>
                {{-- <img src="{{ asset('sion-1.jfif') }}" class="card-img-top img-fluid" alt="..."> --}}
                <p class="mt-3">{!! $post->body !!}</p>
                <a href="{{ route('root') }}"><i class="fas fa-long-arrow-alt-left"> Kembali ke halaman awal</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection