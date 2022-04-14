@extends('layouts.master')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
       
        <div class="card mb-3">
            <img class="card-img-top" src="../../assets/img/generic/13.jpg" alt="" />
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                  <div class="col">
                    <div class="d-flex">
                        <div class="calendar me-2"><span class="calendar-month">Dec</span><span class="calendar-day">31 </span></div>
                        <div class="flex-1 fs--1">
                            <h5 class="fs-0"><a href="#" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                            <p class="mb-0">by <a href="#!" class="text-decoration-none">author Now</a> &bull; 11 hrs </p>
                            <a href="" class="fs-0 text-warning fw-semi-bold">category</a>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-auto mt-4 mt-md-0">
                    <button class="btn btn-falcon-default btn-sm me-2" type="button"><span class="fas fa-heart text-danger me-1"></span>jmlh like</button>
                    <button class="btn btn-falcon-default btn-sm me-2" type="button"><span class="fab fa-teamspeak me-1"></span>See</button>
                  </div>
                </div>
              </div>
        </div>

        <div class="row g-0 mb-3">
            <div class="col ">
              <div class="card mb-3 mb-lg-0">
                <div class="card-body">
                  {{-- body berita --}}
                  
                  
                </div>
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