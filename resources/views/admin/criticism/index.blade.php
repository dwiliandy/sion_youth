@extends('layouts.admin.app',[
    'title' =>'Kritik dan Saran'
])

@section('content')

<div class="container-fluid">

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kritik dan Saran</h6>
      </div>
      <div class="card-body">
        <div class="row justify-content-start">
          @foreach ($criticisms as $criticism)
            <div class="col-lg-4 pt-2">
              <div class="card text-dark bg-light mb-3">
                <div class="card-header"><strong>{{ ucwords($criticism->name) }}</strong></div>
                <div class="card-body pt-0 mt-0">
                  <p class="mt-3">{!! nl2br($criticism->body) !!}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      
  </div>

</div>

@endsection
