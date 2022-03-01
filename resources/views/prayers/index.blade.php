@extends('Layouts.app',[
    'title' =>'Doa'
])

@section('content')
<div class="container">
  <div class="row justify-content-start mt-3">
    <div class="col-lg-12 mb-2">
      <div class="card dashboard service-section d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h5 class="home">Daftar Doa</h5>
          <div class="row justify-content-center">
            @foreach ($prayers as $prayer)
              <div class="col-lg-4 pt-2">
                <div class="card text-dark bg-light mb-3">
                  <div class="card-header"><strong>{{ ucwords($prayer->name) }}</strong></div>
                  <div class="card-body pt-0 mt-0">
                    <p class="mt-3">{!! nl2br($prayer->body) !!}</p>
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