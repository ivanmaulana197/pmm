@extends('admin.layouts.master')


@section('add-css')
<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/prism/prism-okaidia.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row g-3">
    <div class="card">
        <div class="card-body">
            <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin', ) }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Info Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pemerintahan Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Pemerintahan Desa</h5>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-desa">Nama Kepala Desa</label>
                    <div class="col-sm-10">
                        <input name="kepaladesa" class="form-control" id="title" type="text" />
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-kabupaten">Kantor</label>
                    <div class="col-sm-10">
                        <input name="kantor" class="form-control" id="title" type="text" />
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="nama-provinsi">Telpon</label>
                    <div class="col-sm-10">
                        <input name="telpon" class="form-control" id="title" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="logo">Email</label>
                    <div class="col-sm-10">
                        <input name="email" class="form-control" id="title" type="text" />
                    </div>
                </div>
                <button class="btn btn-primary me-2 mb-1" type="button">
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