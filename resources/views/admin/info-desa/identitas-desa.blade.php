@extends('admin.layouts.master')


@section('add-css')
<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/prism/prism-okaidia.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row g-3">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>

    @endif
    <div class="card">
        <div class="card-body">
            <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin', ) }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Info Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Identitas Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Identitas Desa</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('simpan-identitas') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-desa">Nama Desa</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('namaDesa') is-invalid @enderror" id="title" type="text"
                            name="namaDesa" value="{{ $identitas->namaDesa }}" />
                        <small class="text-danger">@error('namaDesa') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-kecamatan">Nama Kecamatan</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('namaKecamatan') is-invalid @enderror" id="title" type="text"
                            name="namaKecamatan" value="{{ $identitas->namaKecamatan }}" />
                        <small class="text-danger">@error('namaKecamatan') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-kabupaten">Nama Kabupaten</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('namaKabupaten') is-invalid @enderror" id="title" type="text"
                            name="namaKabupaten" value="{{ $identitas->namaKabupaten }}" />
                        <small class="text-danger">@error('namaKabupaten') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-provinsi">Nama Provinsi</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('namaProvinsi') is-invalid @enderror" id="title" type="text"
                            name="namaProvinsi" value="{{ $identitas->namaProvinsi }}" />
                        <small class="text-danger">@error('namaProvinsi') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="logo">Logo Desa</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('logo') is-invalid @enderror" id="logo" type="file"
                            name="logo" />
                        <img src="{{ $identitas->logo }}" alt="belum ada">
                        <small class="text-danger">@error('logo') {{$message}} @enderror</small>
                    </div>
                </div>


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
<script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('vendors/prism/prism.js') }}"></script>
@endsection