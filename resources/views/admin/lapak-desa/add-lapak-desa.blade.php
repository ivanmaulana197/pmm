@extends('admin.layouts.master')


@section('add-css')

<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="row g-3">
    <div class="card">
        <div class="card-body">
            <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lapak-desa.index') }}">Lapak Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Lapak Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Tambah Proyek Desa</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('lapak-desa.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="namaLapak">Nama Lapak</label>
                    <div class="col-sm-10"> 
                        <input class="form-control  @error('namaLapak') is-invalid @enderror" type="text"
                            name="namaLapak" placeholder="Masukkan Nama Lapak" value="{{ old('namaLapak')}}">
                        <small class="text-danger">@error('namaLapak') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="pelapak">Nama Pelapak</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('pelapak') is-invalid @enderror" type="text"
                            name="pelapak" placeholder="Masukkan Nama Pelapak" value="{{ old('pelapak')}}">
                        <small class="text-danger">@error('pelapak') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="category_id">kategori</label>
                    <div class="col-md-4">
                        <select class="form-select js-choice form-control @error('category_id') is-invalid @enderror"
                            id="category_id" size="1" name="category_id"
                            data-options='{"removeItemButton":true,"placeholder":false}'
                            aria-placeholder="Pilih kategori...">
                            @foreach ($categories as $category)
                            <option value={{$category->id}}>{{$category->namaCategory}}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">@error('category_id') {{$message}} @enderror</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('alamat') is-invalid @enderror" type="text" name="alamat"
                        placeholder="Masukkan Lokasi Proyek" value="{{ old('alamat')}}">
                        <small class="text-danger">@error('alamat') {{$message}} @enderror</small>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input class="form-control  @error('harga') is-invalid @enderror" type="number"
                            name="harga" placeholder="Masukkan harga" value="{{ old('harga')}}">
                            <small class="text-danger">@error('harga') {{$message}} @enderror</small>
                            
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="NoWA">No. WA</label>
                    <div class="col-sm-10">
                        
                        <input class="form-control  @error('NoWA') is-invalid @enderror" type="text"
                        name="NoWA" placeholder="Masukkan NoWA" value="{{ old('NoWA')}}">
                        <small class="text-danger">@error('NoWA') {{$message}} @enderror</small>
                        
                        
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                    <div class="col-md-10">
                        
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            <small class="text-danger">@error('gambar') {{$message}} @enderror</small>
                        
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control  @error('keterangan') is-invalid @enderror" type="text" name="keterangan"
                            placeholder="Masukkan keterangan" value="{{ old('keterangan')}}"></textarea>
                        <small class="text-danger">@error('keterangan') {{$message}} @enderror</small>
                    </div>
                </div>




                <a href="{{ route('lapak-desa.index') }}" class="btn btn-falcon-default me-2 mb-1"
                    type="button">Kembali
                </a>
                <button class="btn btn-primary me-2 mb-1" type="submit">
                    <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('add-js')
<script src="{{ asset('vendors/choices/choices.min.js') }}"></script>

@endsection