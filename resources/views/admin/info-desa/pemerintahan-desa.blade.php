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
            <form action="{{ route('simpan-pemerintahan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-desa">Nama Kepala Desa</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('namaKepalaDesa') is-invalid @enderror" id="title"
                            type="text" name="namaKepalaDesa" value="{{ $pemerintahan->namaKepalaDesa }}" />
                        <small class="text-danger">@error('namaKepalaDesa') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-kecamatan">Alamat Kantor</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('kantor') is-invalid @enderror" id="title" type="text"
                            name="kantor" value="{{ $pemerintahan->kantor }}" />
                        <small class="text-danger">@error('kantor') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-kabupaten">Telp</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('telp') is-invalid @enderror" id="title" type="text"
                            name="telp" value="{{ $pemerintahan->telp }}" />
                        <small class="text-danger">@error('telp') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-provinsi">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('email') is-invalid @enderror" id="title" type="text"
                            name="email" value="{{ $pemerintahan->email }}" />
                        <small class="text-danger">@error('email') {{$message}} @enderror</small>
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