@push('style')


@endpush
<style>
    .auth-btn {
        border-radius: 20px;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #7952b3">
    <div class="container">
        <a class="navbar-brand" href="/">SionerZ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Konten
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Renungan</a></li>
                        <li><a class="dropdown-item" href="#">Artikel</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Struktur Organisasi</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Berita dan Kegiatan
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Berita</a></li>
                      <li><a class="dropdown-item" href="#">Kegiatan</a></li>
                  </ul>
              </li>
            </ul>
            @auth
            <a class="btn btn-outline-danger auth-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('LOGOUT') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            <a class="btn btn-outline-warning auth-btn" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
            @endauth
        </div>
    </div>
</nav>
