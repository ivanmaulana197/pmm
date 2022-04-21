@extends('layouts.master')

@section('content')

<div class="row g-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Lapak Desa</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($lapaks as $lapak)
                    <div class="col-sm-6">
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
                                    <div class="col-md-auto d-md-block">
                                     
                                        <a class="btn btn-falcon-default btn-sm px-4"
                                            href="{{ route('detail-lapak', $lapak->slug) }}">Detail</a>
                                    </div>
                                </div>
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