@extends('Layouts.app',[
    'title' =>'Main Page'
])

@push('css')
  <style>
    

    .card.dashboard{
      border-radius: 20px;
    }
    .carousel-inner > .carousel-item > img {
      max-height:550px;
    }
    .slider{
      width: 100%;
      max-height: 100vh;
    }
  </style>
@endpush

@section('content')
<div class="slider">
  <div class="row">
    <div class="col-lg-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active  img-fluid">
                <img src="{{ asset('spiderman.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item  img-fluid">
                <img src="{{ asset('spiderman.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item  img-fluid">
                <img src="{{ asset('spiderman.jpg') }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
  </div>
</div>
<div class="row justify-content-start mt-3">
  <div class="col-lg-9 mb-2">
    <div class="card dashboard service-section d-flex justify-content-around">
      <div class="card-body d-flex flex-column dashboard-card">
        <h5 class="home">Khotbah</h5>
        <div class="row justify-content-center">
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3  mb-2">
    <div class="card dashboard birthday-card">
      <div class="card-body d-flex flex-column dashboard-card">
        <h5 class="home">Ulang Tahun</h5>
          <table class="table  table-bordered">
            <tbody>
              <tr>
                <td class="text-center"><span><i class="fas fa-user fa-4x"></i></span></td>      
                <td><p>Dwiliandi Omega
                  <br>5 Januari</p></td>
              </tr> 
              <tr>
                <td class="text-center"><span><i class="fas fa-user fa-4x"></i></span></td>      
                <td><p>Dwiliandi Omega
                  <br>5 Januari</p></td>
              </tr> 
              <tr>
                <td class="text-center"><span><i class="fas fa-user fa-4x"></i></span></td>      
                <td><p>Dwiliandi Omega
                  <br>5 Januari</p></td>
              </tr> 
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-9 mt-2 mb-2">
    <div class="card dashboard service-section mt-2 d-flex justify-content-around">
      <div class="card-body d-flex flex-column dashboard-card">
        <h5 class="home">Artikel</h5>
        <div class="row justify-content-center">
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4  pt-2">
            <div class="card">
              <img src="{{ asset('sion-1.jfif') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-login">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mt-2 mb-2">
    <div class="card dashboard service-section mt-2 d-flex justify-content-around">
      <div class="card-body d-flex flex-column dashboard-card">
        <h5 class="home">Info Ibadah Minggu Ini</h5>
        <h5>Rayon 1</h5>
        <p>Tempat :</p>
        <p>Atas Nama :</p>
        <p>Jam :</p>
        <hr>
        <h5>Rayon 2</h5>
        <p>Tempat :</p>
        <p>Atas Nama :</p>
        <p>Jam :</p>
        <hr>
        <h5>Rayon 3</h5>
        <p>Tempat :</p>
        <p>Atas Nama :</p>
        <p>Jam :</p>
        <hr>
        <h5>Umum</h5>
        <p>Tempat :</p>
        <p>Atas Nama :</p>
        <p>Jam :</p>
        <hr>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 mt-2 mb-2">
    <div class="card dashboard service-section mt-2 d-flex justify-content-around">
      <div class="card-body d-flex flex-column dashboard-card">
        <h5 class="home">Kritik dan Saran</h5>
        <form>
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
  <div class="col-lg-6 mt-2 mb-2">
    <div class="card dashboard service-section mt-2 d-flex justify-content-around">
      <div class="card-body d-flex flex-column dashboard-card">
        <h5 class="home">Pokok Doa</h5>
        <form>
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
@endsection