@extends('layouts.auth.app',[
  'title' =>'Login'
])
@section('content')
<div class="row justify-content-center">
  <div class="col-md-4">
    <main class="form-signin">
      <form method="POST" action="{{ route('login') }}">
       @csrf
          <img class="mb-4 img-fluid  mx-auto d-block" src="{{ asset('sion-1-removebg-preview.png') }}" alt="" width="200" height="200">
        
        @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
           {{ $errors->first() }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        <div class="form-floating">
          <input type="email" class="form-control" name="email" id="floatingInput" autofocus required value="{{ old('email') }}" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="floatingPassword" required placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-login" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-{{ now()->year }}</p>
      </form>
    </main>
  </div>
</div>

@endsection