@extends('layouts.master')

@section('content')

<div class="row g-3">
    <div class="col-lg-8">

        {{-- list berita terbaru --}}
        <div class="card">
            <div class="card-header">
                <h5>Aparatur Desa {{ $identitas->namaDesa }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($aparaturs as $aparatur)
                    <div class="col-md-4">
                        <div class="card">
                            <a href="{{ $aparatur->gambar }}" data-gallery="gallery-1" >
                                <img class="d-block w-100" src="{{ $aparatur->gambar }}"  style="border-radius: 10px;" alt="First slide" />
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h4 class="text-white">{{ $aparatur->nama }}</h4>
                                <p>{{ $aparatur->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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