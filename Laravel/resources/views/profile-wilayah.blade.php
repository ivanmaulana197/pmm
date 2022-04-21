@extends('layouts.master')

@section('content')
<div class="row g-3">
  <div class="col-lg-8">
    <div class="card mb-3">
      <div class=" carousel slide carousel-fade" id="controlStyledExample" data-ride="carousel">
        <div class="carousel-indicators">
          @foreach ($profile->multipleImage as $i=>$image)

          @if ($i==0)
          <button class="active" type="button" data-bs-target="#controlStyledExample" data-bs-slide-to="{{ $i }}"
            aria-current="true" aria-label="Slide {{ $i }}"></button>
          @else
          <button type="button" data-bs-target="#controlStyledExample" data-bs-slide-to="{{ $i }}" aria-current="true"
            aria-label="Slide {{ $i }}"></button>
          @endif

          @endforeach

        </div>
        <div class="carousel-inner rounded">
          @foreach ($profile->multipleImage as $i=>$image)
          @if ($i==0)
          <div class="carousel-item active">
            <a class="post1" href="{{ $image->path }}" data-gallery="gallery-1">
              <img class="card-img-top" src="{{ $image->path }}" alt="" />
            </a>
          </div>
          @else
          <div class="carousel-item">
            <a class="post1" href="{{ $image->path }}" data-gallery="gallery-1">
              <img class="card-img-top" src="{{ $image->path }}" alt="" />
            </a>
          </div>
          @endif
          @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#controlStyledExample"
          data-bs-slide="prev">
          <span class="fas fa-angle-left"></span> <span class="sr-only">Previous</span> </button>
        <button class="carousel-control-next" type="button" data-bs-target="#controlStyledExample"
          data-bs-slide="next">
          <span class="fas fa-angle-right"></span><span class="sr-only">Next</span> </button>

      </div>
      <div class="card-body">
        <div class="row justify-content-between align-items-center">
          <div class="col">
            <div class="d-flex">
              <div class="calendar me-2"><span
                  class="calendar-month">{{$profile->created_at->isoFormat('MMM')}}</span><span class="calendar-day">{{
                  $profile->created_at->isoFormat('D') }}</span>
              </div>
              <div class="flex-1 fs--1">
                <h5 class="fs-0"><a href="#" class="text-decoration-none text-dark">{{ $profile->title }}</a></h5>
                <p class="mb-0">by <a href="#!" class="text-decoration-none">{{ $profile->user->name }}</a> &bull; {{
                  $profile->created_at->diffForHumans() }} </p>
                <a href="" class="fs-0 text-warning fw-semi-bold">{{ $profile->category->nama_category }}</a>
              </div>
            </div>
          </div>
          <div class="col-md-auto mt-4 mt-md-0">
            <button class="btn btn-falcon-default btn-sm me-2" type="button"><span
                class="fas fa-heart text-danger me-1"></span>{{ $profile->like }}</button>
            <button class="btn btn-falcon-default btn-sm me-2"><span class="fab fa-teamspeak me-1"></span>See</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-0 mb-3">
      <div class="col ">
        <div class="card mb-3 mb-lg-0">
          <div class="card-body">
            {{-- body berita --}}
            {!! $profile->body !!}

          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-header">
        <h5>Komentar</h5>
      </div>
      <div class="card-body">
        <form action="">
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlInput1">Email address</label>
            <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="name@example.com" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button class="btn btn-primary" type="submit"> Kirim</button>
        </form>
      </div>
    </div>

  </div>
  {{-- sebelah kanan --}}
  <div class="col-lg-4">


    {{-- identitas desa & pemerintahan desa --}}
    @include('home.identitas-desa')

    {{-- aparatur desa --}}
    @include('home.aparatur-desa')

    {{-- lokasi desa --}}
    @include('home.lokasi-desa')

    {{-- lokasi kantor desa --}}
    @include('home.lokasi-kantor-desa')


  </div>
</div>
@endsection