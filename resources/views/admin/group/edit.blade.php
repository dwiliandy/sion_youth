@extends('layouts.admin.app',[
    'title' =>'Edit Jadwal'
])

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 mt-2 mb-2">
      <div class="card dashboard service-section mt-2 d-flex justify-content-around">
        <div class="card-body d-flex flex-column dashboard-card">
          <h5 class="home">Edit Jadwal</h5>
          <div class="row justify-content-center">
            <form action="{{ route('admin.schedules.update', ['schedule' => $schedule->id]) }}" method="post">
              @csrf
              @method('patch')
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    @error('date')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="date" class="form-control @error('date') is-invalid @enderror"  name="date" id="date" autofocus value="{{ old('date', $schedule->date) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Waktu Ibadah</label>
                    @error('time')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" id="time" value="{{ old('time', $schedule->time) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Ibadah</label>
                    @error('family_name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control @error('family_name') is-invalid @enderror" name="family_name" id="family_name" value="{{ old('family_name', $schedule->family_name) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Atas Nama</label>
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $schedule->name) }}">
                </div>
                <label class="form-label">Kolom</label>
                <div class="input-group mb-3">
                    <select class="form-control" name="group" required id="group">
                        @foreach ($groups as $group)
                          @if (old('group', $schedule->group) == $group->name)
                            <option value="{{ $group->name }}" selected>{{ ucwords($group->name) }}</option>
                          @else
                            <option value="{{ $group->name }}">{{ ucwords($group->name) }}</option>
                          @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Khadim</label>
                  @error('preacher')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input type="text" class="form-control @error('preacher') is-invalid @enderror" name="preacher" id="preacher" value="{{ old('preacher', $schedule->preacher) }}">
              </div>
                <div class="text-center col-md-12">
                  <button type="submit" class="btn btn-lg btn-primary">Update Data</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  @push('js')

  @endpush
@endsection
