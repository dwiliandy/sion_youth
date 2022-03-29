<div class="slider">
  <div class="row mb-3">
      <div class="col-lg-12">
        @if (DB::table('sliders')->count())
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                @foreach (DB::table('sliders')->orderBy('order','asc')->get() as $slider)
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                    class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $loop->index + 1 }}"></button>
                @endforeach
              </div>
              <div class="carousel-inner">
                @foreach (DB::table('sliders')->orderBy('order','asc')->get() as $slider)
                  <div class="carousel-item @if ($loop->first) active @endif  img-fluid">
                    <img src="{{asset('storage/' . $slider->image)}}" class="d-block w-100 " alt="...">
                  </div>
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
          </div>
        @endif
      </div>
  </div>
</div>