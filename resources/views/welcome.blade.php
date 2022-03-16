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
    @media all and (min-width:768px){
      .carousel-inner>.carousel-item>img {
          height:  calc(100vh - 48px);
      }
    }
    @media all and (max-width:768px){
      .carousel-inner>.carousel-item>img {
        max-height: 600px;
      }
    }
      .card.dashboard {
          border-radius: 20px;
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
          @if ($sliders->count())
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  @foreach ($sliders as $slider)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                      class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $loop->index + 1 }}"></button>
                  @endforeach
                </div>
                <div class="carousel-inner">
                  @foreach ($sliders as $slider)
                    <div class="carousel-item @if ($loop->first) active @endif  img-fluid">
                      <img src="{{asset('storage/' . $slider->image)}}" class="d-block w-100 " alt="...">
                    </div>
                  @endforeach
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
          @endif
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-start">
        <div class="col-lg-9">
            <div class="card dashboard service-section d-flex justify-content-around mb-3">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Jadwal Ibadah</h5>
                    <div class="row justify-content-start">
                      @if ($schedules->count() > 0)
                        @foreach ($schedules as $schedule)
                          <div class="col-lg-6 pt-2">
                              <div class="card">
                                  <div class="card-body">
                                    <div class="text-center">
                                      <h5 class="card-title">{{ $schedule->sector->name }}</h5>
                                    </div>
                                    <table class="table table-borderless">
                                      <tbody>
                                        <tr>
                                          <td width="1px" class="mt-3"><i class="far fa-calendar-alt"></i></td>
                                          <td class="mt-3">: {{ Carbon\Carbon::parse($schedule->date)->isoFormat('dddd, D MMMM Y') }}</td>
                                        </tr>
                                        <tr>
                                          <td><i class="fas fa-clock"></i></td>
                                          <td>: {{ Carbon\Carbon::parse($schedule->time)->isoFormat('HH:mm') }}</td>
                                        </tr>
                                        <tr>
                                          <td><i class="fas fa-home"></i></td>
                                          <td>: {{ $schedule->family_name }} 
                                            @if ( $schedule->group != '-')
                                              (Kolom {{ $schedule->group }})
                                            @endif
                                          </td>
                                        </tr>
                                        <tr>
                                          <td><i class="fas fa-user"></i></td>
                                          <td>: {{ $schedule->name }}</td>
                                        </tr>
                                        <tr>
                                          <td><i class="fas fa-bullhorn"></i></td>
                                          <td>: {{ $schedule->preacher }}</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                      @if ($schedule->description)
                                        <hr>
                                        <strong>{!! nl2br($schedule->description) !!}</strong>
                                      @endif
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
        <div class="col-lg-3">
            <div class="card dashboard birthday-card mb-3">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Ulang Tahun</h5>
                    @if ($member_birthday->count() > 0)
                      <table class="table  table-bordered">
                        <tbody>
                            @foreach ($member_birthday as $birthday)
                              <tr>
                                <td class="text-center"><span><i class="fas fa-user fa-4x"></i></span></td>
                                  <td>
                                      <p>{{ ucwords($birthday->name) }}
                                          <br>{{ Carbon\Carbon::parse($birthday->birth_date)->isoFormat('D MMMM') }}</p>
                                          {{-- get umur
                                          <p>{{ Carbon\Carbon::parse('20-04-2000')->age }}</p> --}}
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    @else
                      <p class="text-center"><strong>Tidak ada Data</strong></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card dashboard service-section d-flex justify-content-around">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Khotbah</h5>
                    <div class="row justify-content-start">
                        @if ($khotbahs->count() > 0)
                        @foreach ($khotbahs as $khotbah)
                        <div class="col-lg-4  pt-2">
                            <div class="card">
                              @if ($khotbah->image)
                                <img src="{{ asset('storage/'. $khotbah->image) }}" alt="">
                              @else
                                <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
                              @endif
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
                    <div class="row justify-content-start">
                        @if ($articles->count() > 0)
                        @foreach ($articles as $article)
                        <div class="col-lg-4  pt-2">
                            <div class="card">
                              @if ($article->image)
                                <img src="{{ asset('storage/'. $article->image) }}" alt="">
                              @else
                                <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
                              @endif
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
                        <div class="text-center">
                          <button type="submit" class="btn btn-login">Submit</button>
                        </div>
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
                        <div class="text-center">
                          <button type="submit" class="btn btn-login">Submit</button>
                        </div>
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
