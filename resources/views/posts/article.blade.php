@extends('layouts.app',[
'title' =>'Artikel'
])

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mt-2 mb-2">
        <div class="card dashboard service-section mt-2 d-flex justify-content-around">
          <div class="card-body d-flex flex-column dashboard-card">
            <h5 class="home">Daftar Artikel</h5>
            <div class="row justify-content-center">
              @foreach ($articles as $article)
              <div class="col-lg-4  pt-2">
                <div class="card">
                  <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <small>{{ date('d-m-y', strtotime($article->created_at)) }}</small>
                    <hr>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ route('posts.show', ['post' => $article->id]) }}" class="btn btn-login">Baca Selengkapnya</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection