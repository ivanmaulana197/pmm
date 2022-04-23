@extends('layouts.master')

@section('content')
 
    <div class="row g-3">
        <div class="col-lg-8">
           
            {{-- list berita terbaru --}}
            @include('home.berita')
           
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