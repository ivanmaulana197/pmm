@extends('layouts.master')

@section('content')

<div class="row g-3">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button class="btn-close close" type="button" aria-label="Close" data-dismiss="alert"></button>
        <strong>{{ $message }}</strong>
    </div>

    @endif
<div class="col-lg-8">
    <div class="card mb-3">
        <div class="card-header">
            <h5>Pengaduan</h5>
        </div>
        <div class="card-body">
            <form action="/pengaduan" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input class="form-control" id="nama" type="text" name="nama" placeholder="Input Nama" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="pengaduan">Pengaduan</label>
                    <textarea class="form-control" id="pengaduan" name="pengaduan" rows="3"
                        placeholder="Input pengaduan anda"></textarea>
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