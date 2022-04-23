@extends('layouts/master')

@section('content')
    {{-- crousal --}}
    @include('home.crousal')
    <div class="row g-3">
        <div class="col-lg-8">
            @include('home.category')

            {{-- jadwal sholat --}}
            @include('home.jadwal-sholat')

            {{-- list berita terbaru --}}
            @include('home.berita')

             {{-- Galeri foto --}}
             <div class="card mb-3">
                <div class="card-header">
                    <div class="card text-center bg-300">
                        <div class="card-header py-2">
                            <h5>GALERI FOTO</h5>
                        </div>
                        <div class="card-body bg-400">
                            <div class="row ">
                                <div class="col-4">
                                    <a href="#" data-bs-toggle="tooltip"  title="Baca selengkapnya">
                                        <img src="{{ asset('/assets/img/generic/5.jpg') }}" class="card-img-top" alt="...">
                                    </a>
                                    <h6 class="mt-1">title</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- data statistik --}}
            <div class="card mb-3">
                <div class="card-header">
                    <div class="card text-center bg-300">
                        <div class="card-header py-2">
                            <h5>DATA STATISTIK</h5>
                        </div>
                        <div class="card-body bg-400">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <div class="border-sm-end border-300">
                                        <div class="text-center">
                                            <span class="fas fa-male" style="font-size: 30px"></span>
                                            <h6 class="text-700">Laki-Laki</h6>
                                            <h3 class="fw-normal text-700">1729</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-sm-end border-300">
                                        <div class="text-center">
                                            <span class="fas fa-female" style="font-size: 30px"></span>
                                            <h6 class="text-700">Perempuan</h6>
                                            <h3 class="fw-normal text-700">1662</h3>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-300">
                                        <div class="text-center">
                                            <span class="bi-people-fill" style="font-size: 30px"></span>
                                            <h6 class="text-700">Total</h6>
                                            <h3 class="fw-normal text-700">3391</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
           

           
        </div>
        {{-- sebelah kanan --}}
        <div class="col-lg-4">
            {{-- slide info teks gerak --}}
            @include('home.info')

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
