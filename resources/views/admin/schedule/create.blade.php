@extends('layouts.admin.app',[
'title' =>'Buat Jadwal'
])

@push('css')
<link rel="stylesheet" href="{{ asset('css/timepicker.min.css') }}">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div class="container-fluid">

  {{-- Breadcrumb --}}
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.sectors.index') }}">Kelompok</a></li>
      <li class="breadcrumb-item"><a href="{{ route('get-schedule', ['sector' => $sector]) }}">Jadwal Ibadah {{ Str::title($sector_name) }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Jadwal</li>
    </ol>
  </nav>
  {{-- End Breadcrumb --}}

    <div class="row">
        <div class="col-lg-12 mt-2 mb-2">
            <div class="card dashboard service-section mt-2 d-flex justify-content-around">
                <div class="card-body d-flex flex-column dashboard-card">
                    <h5 class="home">Buat Jadwal</h5>
                    <div class="row justify-content-center">
                        <form action="{{ route('admin.schedules.store') }}" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="sector_id" id="sector_id"
                                value="{{ $sector }}">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Tanggal</label>
                                    @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" id="date" autofocus value="{{ old('date') }}">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Waktu Ibadah</label>
                                    @error('time')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="text"
                                        class="form-control bs-timepicker @error('time') is-invalid @enderror"
                                        name="time" id="time" value="{{ old('time') }}">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Kolom</label>
                                    <select class="form-control" name="group" required id="group">
                                        <option value="-" selected>Pilih</option>
                                        @foreach ($groups as $group)
                                        @if (old('group') == $group->name)
                                        <option value="{{ $group->name }}" selected>{{ ucwords($group->name) }}</option>
                                        @else
                                        <option value="{{ $group->name }}">{{ ucwords($group->name) }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Ibadah</label>
                                @error('family_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="text" class="form-control @error('family_name') is-invalid @enderror"
                                    name="family_name" id="family_name" value="{{ old('family_name') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Atas Nama</label>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Khadim</label>
                                @error('preacher')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input type="text" class="form-control @error('preacher') is-invalid @enderror"
                                    name="preacher" id="preacher" value="{{ old('preacher') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea class="form-control" name="description" id="description"
                                    rows="3">{{{ old('description') }}}</textarea>
                            </div>
                            <div class="text-center col-md-12">
                                <button type="submit" class="btn btn-lg btn-primary">Buat Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.bs-timepicker').timepicker();
    });

    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    $('#date').attr('min', maxDate);
});
</script>
@push('js')
<script src="{{ asset('js/timepicker.min.js') }}"></script>
@endpush
@endsection
