@extends('layouts.master')

@section('content')
<div class="row g-3">
  <div class="col-lg-8">
    <div class="card mb-3">
        <a href="{{ $lapak->gambar }}" data-gallery="gallery-1">
            <img class="card-img-top" src="{{ $lapak->gambar }}" alt="" />
        </a>
        <div class="card-body overflow-hidden">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <div class="d-flex">
                        
                        <div class="flex-1 fs--1">
                            <h5 class="fs-0"><a href="{{ route('detail-lapak', $lapak->slug) }}">{{ $lapak->namaLapak}}</a></h5>
                            <p class="mb-0">by {{ $lapak->pelapak }} • WA: {{ $lapak->NoWA }}</p><span
                                class="fs-0 text-warning fw-semi-bold">Rp.  {{ number_format($lapak->harga,2,',','.'); }}</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row g-0 mb-3">
      <div class="col ">
        <div class="card mb-3 mb-lg-0">
          <div class="card-body">
            <p>{{ $lapak->keterangan }}</p>
            <p>{{ $lapak->alamat }}</p>
            <p>Harga : {{ $lapak->harga }}</p>
            <p>Kategory : {{ $lapak->category->namaCategory }}</p>
            <p>Pelapak : {{ $lapak->pelapak }}</p>
            <p>No.WA : {{ $lapak->NoWA }}</p>
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