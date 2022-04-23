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
                    <li class="breadcrumb-item"><a href="{{ route('proyek-desa.index') }}">Proyek Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Proyek Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Proyek Desa {{ $proyekDesa->namaKegiatan }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('proyek-desa.update', $proyekDesa->slug) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="namaKegiatan">Nama Kegiatan</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('namaKegiatan') is-invalid @enderror" type="text"
                            name="namaKegiatan" placeholder="Masukkan Nama Kegiatan" value="{{ $proyekDesa->namaKegiatan}}">
                        <small class="text-danger">@error('namaKegiatan') {{$message}} @enderror</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('lokasi') is-invalid @enderror" type="text" name="lokasi"
                            placeholder="Masukkan Lokasi Proyek" value="{{ $proyekDesa->lokasi}}">
                        <small class="text-danger">@error('lokasi') {{$message}} @enderror</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="lokasi">Anggaran</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input class="form-control  @error('anggaran') is-invalid @enderror" type="number"
                                name="anggaran" placeholder="Masukkan Anggaran" value="{{ $proyekDesa->anggaran}}">
                            <small class="text-danger">@error('anggaran') {{$message}} @enderror</small>

                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="volume">Volume</label>
                    <div class="col-sm-6">
                        <div class="input-group mb-2">
                            <input class="form-control  @error('volume') is-invalid @enderror" type="number"
                                name="volume" placeholder="Masukkan Volume Proyek" value="{{ $proyekDesa->volume}}">
                            <small class="text-danger">@error('volume') {{$message}} @enderror</small>
                            <div class="input-group-prepend">
                                <div class="input-group-text">m<sup>2</sup></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="sumberDana">Sumber Dana</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('sumberDana') is-invalid @enderror" type="text"
                            name="sumberDana" placeholder="Masukkan Sumber Dana Proyek" value="{{ $proyekDesa->sumberDana}}">
                        <small class="text-danger">@error('sumberDana') {{$message}} @enderror</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="tahun">Tahun Proyek</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('tahun') is-invalid @enderror" type="number" name="tahun"
                            placeholder="Masukkan Tahun Proyek" value="{{ $proyekDesa->tahun}}">
                        <small class="text-danger">@error('tahun') {{$message}} @enderror</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="pelaksana">Pelaksana</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('pelaksana') is-invalid @enderror" type="text"
                            name="pelaksana" placeholder="Masukkan Pelaksana Proyek" value="{{ $proyekDesa->pelaksana}}">
                        <small class="text-danger">@error('pelaksana') {{$message}} @enderror</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="manfaat">Manfaat</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('manfaat') is-invalid @enderror" type="text" name="manfaat"
                            placeholder="Masukkan Manfaat Proyek" value="{{ $proyekDesa->manfaat}}">
                        <small class="text-danger">@error('manfaat') {{$message}} @enderror</small>
                    </div>
                </div>



                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                    <div class="col-md-10">
                            <textarea id="keterangan" class="form-control @error('manfaat') is-invalid @enderror"
                                 placeholder="Masukkan Keterangan Proyek"
                                name="keterangan">{{ $proyekDesa->keterangan}}</textarea>
                            <small class="text-danger">@error('manfaat') {{$message}} @enderror</small>
                        
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                    <div class="col-md-10">
                        
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            <small class="text-danger">@error('gambar') {{$message}} @enderror</small>
                            <img src="{{ $proyekDesa->gambar}}" alt="" class="img-fluid img-thumbnail" alt="" width="260">
                        
                    </div>
                </div>



                <a href="{{ route('proyek-desa.index') }}" class="btn btn-falcon-default me-2 mb-1"
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