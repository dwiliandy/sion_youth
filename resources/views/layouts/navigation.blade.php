
<style>
    .auth-btn {
        border-radius: 5px;
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
                    <a class="nav-link {{ Request::routeIs('root') ? 'active' : '' }}" aria-current="page" href="{{ route('root') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ (Request::routeIs('khotbah') || Request::routeIs('article')) ? 'active' : '' }}" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Konten
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('khotbah') }}">Renungan</a></li>
                        <li><a class="dropdown-item" href="{{ route('article') }}">Artikel</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}">Kontribusi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('organization') ? 'active' : '' }}" href="{{ route('organization') }}">Struktur Organisasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('organization') ? 'active' : '' }}" href="{{ route('news.index') }}">Berita dan Kegiatan</a>
                </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('prayers.index') ? 'active' : '' }}" aria-current="page" href="{{ route('prayers.index') }}">Doa</a>
            </li>
            </ul>
            @auth
            <a class="btn btn-outline-warning auth-btn mx-2" href="{{ route('dashboard') }}"><strong>Admin</strong></a>
            <a class="btn btn-outline-light auth-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <strong>{{ __('LOGOUT') }}</strong>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            <a class="btn btn-outline-light auth-btn" href="{{ route('login') }}"><strong>{{ __('LOGIN') }}</strong></a>
            @endauth
        </div>
    </div>
</nav>
