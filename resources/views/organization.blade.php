@extends('layouts.app',[
'title' =>'Struktur Organisasi'
])

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-12 mt-2 mb-2">
            <div class="card dashboard service-section d-flex justify-content-around mb-3">
                <div class="card-body d-flex flex-column dashboard-card">
                    <nav aria-label="breadcrumb" class="mb-1" style="--bs-breadcrumb-divider: '>';">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('root') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
                      </ol>
                    </nav>
                    <img src="{{ asset('struktur-organisasi.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
