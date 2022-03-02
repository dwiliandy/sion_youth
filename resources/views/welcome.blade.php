@extends('layouts.app',[
'title' =>'Main Page'
])

@push('css')
  <link rel="stylesheet" href="{{ asset('gallery/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('gallery/css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('gallery/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('gallery/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('gallery/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('gallery/css/fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('gallery/css/swiper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('gallery/css/style.css') }}">


  {{-- <link rel="stylesheet" href="{{ asset('css/gallery/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/gallery/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="{{ asset('css/gallery/jquery.scrollbar.css') }}"> --}}
  <style>
      .card.dashboard {
          border-radius: 20px;
      }

      .carousel-inner>.carousel-item>img {
          max-height: 550px;
      }

      .slider {
          width: 100%;
          max-height: 100vh;
      }

  </style>
@endpush

@section('content')
<div class="slider">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active  img-fluid">
                        <img src="{{ asset('spiderman.jpeg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item  img-fluid">
                        <img src="{{ asset('spiderman.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item  img-fluid">
                        <img src="{{ asset('spiderman.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-start mb-3">
        <div class="col-lg-9">
            <div class="card dashboard service-section d-flex justify-content-around">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Jadwal Ibadah</h5>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 pt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Rayon</h5>
                                    <small>10-10-10</small>
                                    <hr>
                                    <p class="card-text">Tempat Ibadah : asdasdas
                                        <br>Khadim : asdasdsadsa
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 pt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Rayon</h5>
                                    <small>10-10-10</small>
                                    <hr>
                                    <p class="card-text">Tempat Ibadah : asdasdas
                                        <br>Khadim : asdasdsadsa
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 pt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Rayon</h5>
                                    <small>10-10-10</small>
                                    <hr>
                                    <p class="card-text">Tempat Ibadah : asdasdas
                                        <br>Khadim : asdasdsadsa
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 pt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Rayon</h5>
                                    <small>10-10-10</small>
                                    <hr>
                                    <p class="card-text">Tempat Ibadah : asdasdas
                                        <br>Khadim : asdasdsadsa
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card dashboard birthday-card">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Ulang Tahun</h5>
                    <table class="table  table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-center"><span><i class="fas fa-user fa-4x"></i></span></td>
                                <td>
                                    <p>Dwiliandi Omega
                                        <br>5 Januari</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><span><i class="fas fa-user fa-4x"></i></span></td>
                                <td>
                                    <p>Dwiliandi Omega
                                        <br>5 Januari</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><span><i class="fas fa-user fa-4x"></i></span></td>
                                <td>
                                    <p>Dwiliandi Omega
                                        <br>5 Januari</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card dashboard service-section d-flex justify-content-around">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Khotbah</h5>
                    <div class="row justify-content-center">
                        @if ($khotbahs->count() > 0)
                        @foreach ($khotbahs as $khotbah)
                        <div class="col-lg-4  pt-2">
                            <div class="card">
                                <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $khotbah->title }}</h5>
                                    <small>{{ Carbon\Carbon::parse($khotbah->published_at)->isoFormat('dddd, D MMMM Y H:m') }}</small>
                                    <hr>
                                    <p class="card-text">{{$khotbah->excerpt}}</p>
                                    <a href="{{ route('posts.show', ['post' => $khotbah->id]) }}"
                                        class="btn btn-login">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="py-3 d-flex align-items-end flex-column">
                            <a class="text-right" href="{{ route('khotbah') }}">Lihat Semua Khotbah</a>
                        </div>
                        @else
                        <p class="text-center"><strong>Tidak ada Data</strong></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card dashboard service-section d-flex justify-content-around">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Artikel</h5>
                    <div class="row justify-content-center">
                        @if ($articles->count() > 0)
                        @foreach ($articles as $article)
                        <div class="col-lg-4  pt-2">
                            <div class="card">
                                <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <small>{{ Carbon\Carbon::parse($article->published_at)->isoFormat('dddd, D MMMM Y H:m') }}</small>
                                    <hr>
                                    <p class="card-text">{{$article->excerpt}}</p>
                                    <a href="{{ route('posts.show', ['post' => $article->id]) }}"
                                        class="btn btn-login">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="py-3 d-flex align-items-end flex-column">
                            <a class="text-right" href="{{ route('article') }}">Lihat Semua Artikel</a>
                        </div>
                        @else
                        <p class="text-center"><strong>Tidak ada Data</strong></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12 mb-2">
        <div class="card dashboard service-section d-flex justify-content-around">
            <div class="card-body d-flex flex-column dashboard-card">
                <h5 class="home">Gallery</h5>
                <div class="col-lg-12">
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide cover"
                                style="background-image: url('{{ asset('spiderman.jpg') }}');">
                                <a href="{{ asset('spiderman.jpg') }}" data-fancybox="gallery"
                                    class="zoom"><i class="fas fa-search-plus"></i></a>
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide cover"
                                style="background-image:url({{ asset('spiderman.jpg') }})"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-6">
            <div class="card dashboard service-section mt-2 d-flex justify-content-around">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Kritik dan Saran</h5>
                    <form action="{{ route('criticism.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kritik atau Saran</label>
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-login">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card dashboard service-section mt-2 d-flex justify-content-around">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Pokok Doa</h5>
                    <form action="{{ route('prayers.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Doa</label>
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-login">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  @push('js')
  <script src="{{ asset('gallery/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('gallery/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('gallery/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('gallery/js/popper.min.js') }}"></script>
  <script src="{{ asset('gallery/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('gallery/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('gallery/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('gallery/js/aos.js') }}"></script>
  <script src="{{ asset('gallery/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('gallery/js/swiper.min.js') }}"></script>
  <script src="{{ asset('gallery/js/main.js') }}"></script>
  @endpush
@endsection
