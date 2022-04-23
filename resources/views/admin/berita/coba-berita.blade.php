@extends('admin.layouts.master')


@section('add-css')
{{--
<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet">
{{--
<link href="{{ asset('vendors/prism/prism-okaidia.css') }}" rel="stylesheet"> --}}
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
            <form action="{{ route('simpan-berita') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="title">Judul</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('title') is-invalid @enderror" type="text" name="title"
                            placeholder="Masukkan Judul Berita" value="{{ old('title')}}">
                        <small class="text-danger">@error('title') {{$message}} @enderror</small>
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
                            <option value={{$category->id}}>{{$category->nama_category}}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">@error('category_id') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="gambar">Gambar berita</label>
                    <div class="col-md-10">
                        <div class="mb-3">
                            <input class="form-control" id="gambar" name="gambar[]" type="file" multiple='multiple' />
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="body">Isi Berita</label>
                    <div class="col-md-10">
                        <div class="min-vh-50">
                            <textarea id="summernote" class="form-control" name="body"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">Inputkan poster anda</label>
                    <div class="col-md-6">
                        <div class="min-vh-50">
                            <select class="form-select form-control @error('status') is-invalid @enderror" name="status"
                                data-style="btn-outline-primary" data-size="5">
                                <option>Draft</option>
                                <option>Published</option>
                            </select>
                            <small class="text-danger">@error('status') {{$message}} @enderror</small>

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
{{-- <script src="{{ asset('vendors/choices/choices.min.js') }}"></script> --}}
{{-- <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#summernote').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
        height: 400,
        popatmouse:true,
    });
    })
</script>
{{-- <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('vendors/prism/prism.js') }}"></script> --}}
@endsection