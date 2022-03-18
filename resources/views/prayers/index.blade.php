@extends('layouts.app',[
    'title' =>'Doa'
])

@section('content')
<div class="container">
  <div class="row justify-content-start mt-3">
    <div class="col-lg-12 mb-2">
      <div class="card dashboard service-section d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <nav aria-label="breadcrumb" class="mb-1" style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('root') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Doa</li>
            </ol>
          </nav>
          <h5 class="home text-center">DOA</h5>
          <div class="row justify-content-start">
            @if ($prayers->count() > 0)
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
            @else
              <p class="text-center mt-3"><strong>Tidak ada Data</strong></p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection