@extends('layouts.admin.app',[
    'title' =>'Admin Dashboard'
])

@section('content')
    <div class="container-fluid pb-4">
      <div class="row">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="border-radius-lg h-75">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4" src="{{ asset('sion-1.jfif') }}"  alt="logo">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-column h-50">
                      <p class="mb-1 pt-2 text-bold">{{Auth::user()->name}}</p>
                      <h5 class="font-weight-bolder">{{Auth::user()->email}}</h5>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
              <div class="card-body">
                <form method="get" action="{{ route('updatePassword',Auth::user()->id) }}" autocomplete="off">
                <div class="form-group">
                  <label for="input_holiday_name">Password</label>
                  <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current_password">
                    @error('current_password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="input_holiday_name">Password Baru</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="input_start">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="password_confirmation">
                    @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <center>
                  <button type="submit" class="btn btn-primary">Ganti Password</button>
                  </center>
                </div>
              </form>
              </div>
          </div>
      </div>
      </div>
</div>
@endsection
