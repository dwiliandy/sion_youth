@extends('layouts.auth.app',[
  'title' =>'Login'
])
@section('content')
<div class="row justify-content-center">
  <div class="col-md-4">
    <main class="form-signin">
      <form method="POST" action="{{ route('login') }}">
       @csrf
          <img class="mb-4 img-fluid  mx-auto d-block" src="{{ asset('sion-1.jfif') }}" alt="" width="200" height="200">
        <div class="form-floating">
          <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-login" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-{{ now()->year }}</p>
      </form>
    </main>
  </div>
</div>

@endsection