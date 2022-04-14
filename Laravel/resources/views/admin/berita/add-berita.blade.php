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
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/berita">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Berita</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Tambah Berita</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('simpan-berita') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="title">Judul</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="title" type="text" />
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="category_id">kategori</label>
                    <div class="col-md-4">
                        <select class="form-select js-choice" id="category_id" size="1" name="category_id" data-options='{"removeItemButton":true,"placeholder":false}' aria-placeholder="Pilih kategori...">
                            @foreach ($categories as $category)
                           
                            <option value={{$category->id}}>{{$category->nama_category}}</option>
                            

                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="gambar">Gambar berita</label>
                    <div class="col-md-10">
                        <div class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone"
                            data-dropzone="data-dropzone" action="#!">
                            <div class="fallback">
                                <input class="form-control" name="gambar" type="file" multiple="multiple" />
                            </div>
                            <div class="dz-message" data-dz-message="data-dz-message">
                                <img class="me-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25"
                                    alt="" />Drop your files here
                            </div>
                            <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                                <div class="d-flex media mb-3 pb-3 border-bottom btn-reveal-trigger">
                                    <img class="dz-image" src="{{ asset('assets/img/generic/image-file-2.png') }}"
                                        alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                                    <div class="flex-1 d-flex flex-between-center">
                                        <div>
                                            <h6 data-dz-name="data-dz-name"></h6>
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 fs--1 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                                <div class="dz-progress">
                                                    <span class="dz-upload" data-dz-uploadprogress=""></span>
                                                </div>
                                            </div>
                                            <span class="fs--2 text-danger"
                                                data-dz-errormessage="data-dz-errormessage"></span>
                                        </div>
                                        <div class="dropdown font-sans-serif">
                                            <button
                                                class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="fas fa-ellipsis-h"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-2">
                                                <a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Hapus
                                                    File</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="content">Isi Berita</label>
                    <div class="col-md-10">
                        <div class="min-vh-50">
                            <textarea class="tinymce d-none" name="content"></textarea>
                        </div>
                    </div>
                </div>

                <button class="btn btn-falcon-default me-2 mb-1" type="button">Kembali
                </button>
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