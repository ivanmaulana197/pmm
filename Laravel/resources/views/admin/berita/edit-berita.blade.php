@extends('admin.layouts.master')


@section('add-css')
<link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row g-3">
    <div class="card">
        <div class="card-body">
            <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/berita">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Berita</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Edit Berita</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('update-berita', $post->slug) }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="title">Judul</label>
                    <div class="col-sm-10">
                        <input class="form-control  @error('title') is-invalid @enderror" type="text" name="title"
                            placeholder="Masukkan Judul Berita" value="{{ $post->title }}">
                        <small class="text-danger">@error('title') {{$message}} @enderror</small>
                    </div>
                </div>
                <div class="row  mb-3">
                    <label class="col-sm-2 col-form-label" for="category">kategori</label>
                    <div class="col-md-4">
                        <select class="form-select js-choice" id="organizerSingle" size="1" name="category_id"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Select organizer...</option>
                            @foreach ($categories as $category)
                            @if($category->id==$post->category_id)
                            <option value={{$category->id}} selected>{{$category->nama_category}}</option>
                            @else
                            <option value={{$category->id}}>{{$category->nama_category}}</option>
                            @endif

                            @endforeach
                        </select>
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
                            <textarea id="body" class="form-control tinymce" name="body">
                                {!! $post->body !!}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">Inputkan poster anda</label>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <select class="form-select form-control @error('status') is-invalid @enderror" name="status"
                                data-style="btn-outline-primary" data-size="5">
                                @if($post->status=='Draft')
                                <option selected>Draft</option>
                                <option>Published</option>
                                @else
                                <option>Draft</option>
                                <option selected>Published</option>
                                @endif
                            </select>
                            <small class="text-danger">@error('status') {{$message}} @enderror</small>

                        </div>
                    </div>
                </div>

                <a href="{{ route('berita') }}" class="btn btn-falcon-default me-2 mb-1" type="button">kembali
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
<script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>

<script>
    tinymce.init({
        
        selector:'#body',
        image_class_list: [
            {title: 'img-responsive', value: 'img-fluid rounded'},
            ],
        height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media table emoticons template contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image print preview media fullscreen | forecolor backcolor emoticons | help",
            menubar: 'favs file edit view insert format tools table help',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            // relative_urls:false,
            // images_upload_handler: function(blobInfo, success, failure){
            //     var xhr, formData;
            //     xhr = new XMLHttpRequest();
            //     xhr.withCredentials = false;
            //     xhr.open('POST', '{{ route('uplod') }}');
            //     var token = '{{ csrf_token() }}'
            //     xhr.setRequestHeader("X-CSRF-Token", token);
            //     xhr.onload = function(){
            //         var json;
            //         if(xhr.status != 200){
            //             failure('HTTP Error: ' +xhr.status);
            //             return;
            //         }
            //         json = JSON.parse(xhr.responseText);

            //         if(!json || typeof json.loaction != 'string'){
            //             failure('Invalid JSON: ' + xhr.responseText);
            //             return;
            //         }
            //         success(json.loaction);
            //     };
            //     formData = new FormData();
            //     formData.append('file', blobInfo.blob(), blobInfo.filename());
            //     xhr.send(formData);
            // }
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{ route('uplod',['_token'=>csrf_token()]) }}',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    console.log(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        console.log(blobCache);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
  });
    
</script>
@endsection