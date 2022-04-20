@extends('admin.layouts.master')


@section('add-css')

<link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
{{--
<link href="{{ asset('vendors/summernote/summernote.min.css') }}" rel="stylesheet"> --}}
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
                @method('PUT')
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
                            <input class="form-control" id="gambar" name="gambar[]" type="file" multiple='multiple'
                                onchange="previewImage()" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="preview">Preview gambar</label>

                        {{-- <img class="preview-img img-fluid"> --}}
                        <div class=" preview-img col-md-5 carousel slide carousel-fade" id="controlStyledExample"
                            data-ride="carousel">
                            {{-- <div class="carousel-indicators cindi">
                                <button class="active" type="button" data-bs-target="#controlStyledExample"
                                    data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#controlStyledExample" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#controlStyledExample" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner rounded cinn">
                                <div class="carousel-item active">
                                    <a class="post1" href="{{ asset('assets/img/generic/5.jpg') }}"
                                        data-gallery="gallery-1">
                                        <img class="d-block w-100" src="{{ asset('assets/img/generic/5.jpg') }}"
                                            alt="First slide" />
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="post1" href="{{ asset('assets/img/generic/7.jpg') }}"
                                        data-gallery="gallery-1">
                                        <img class="d-block w-100" src="{{ asset('assets/img/generic/7.jpg') }}"
                                            alt="First slide" />
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="post1" href="{{ asset('assets/img/generic/8.jpg') }}"
                                        data-gallery="gallery-1">
                                        <img class="d-block w-100" src="{{ asset('assets/img/generic/8.jpg') }}"
                                            alt="First slide" />
                                    </a>
                                </div>
                            </div> --}}
                            {{-- --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                        <div class="col-md-5 carousel slide carousel-fade" id="carouselExampleCaptions"
                            data-ride="carousel">
                            <div class="carousel-inner light" style="border-radius: 30px;">
                                @foreach($post->multipleImage as $i=>$image)
                                @if ($i==0)
                                <div class="carousel-item active">
                                    <a class="post1" href="{{ $image->path }}" data-gallery="gallery-1">
                                        <img class="card-img-top" src="{{ $image->path }}" alt="" />
                                    </a>
                                </div>
                                @else
                                <div class="carousel-item">
                                    <a class="post1" href="{{$image->path }}" data-gallery="gallery-1">
                                        <img class="card-img-top" src="{{ $image->path }}" alt="" />
                                    </a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                </div>


                <script>
                    function previewImage(){
                        const image = document.querySelector('#gambar');
                        const imgPreview = document.querySelector('.preview-img');
                        let cIndicator = document.createElement('div');
                        cIndicator.className = 'carousel-indicators';
                        let cInner = document.createElement('div');
                        cInner.className = 'carousel-inner';
                        imgPreview.appendChild(cIndicator);
                        imgPreview.appendChild(cInner);
                        for (let i = 0; i< image.files.length;i++){
                            let reader = new FileReader();
                            let btn = document.createElement('button');
                            if (i==0){

                                btn.className = 'active';
                            }
                            btn.type = 'button';
                            btn.setAttribute('data-bs-target','#controlStyledExample');
                            btn.setAttribute('data-bs-slide-to',i);
                            btn.setAttribute('aria-current','true');
                            btn.setAttribute('aria-label','Slide '+i);
                            cIndicator.appendChild(btn);
                            let item = document.createElement('div');
                            item.className = "carousel-item";
                            if(i==0){
                                item.className += ' active';
                            }  
                            reader.onload=()=>{
                                let a = document.createElement('a');
                                a.href = reader.result;
                                a.setAttribute('data-gallery',"gallery-1");
                                let img = document.createElement('img');
                                img.className = 'd-block w-100';
                                img.src = reader.result;
                                a.appendChild(img);
                                item.appendChild(a);
                            }
                            cInner.appendChild(item);
                            reader.readAsDataURL(image.files[i]);
                        }

                        // imgPreview.innerHTML += '<button class="carousel-control-prev" type="button" data-bs-target="#controlStyledExample" data-bs-slide="prev"> <span class="fas fa-angle-left"></span> <span class="sr-only">Previous</span> </button> <button class="carousel-control-next" type="button" data-bs-target="#controlStyledExample" data-bs-slide="next"> <span class="fas fa-angle-right"></span><span class="sr-only">Next</span> </button>';
                        
                    }


                </script>

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
<script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
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
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
  });
    
</script>


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
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
</script> --}}
{{-- <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('vendors/prism/prism.js') }}"></script> --}}
@endsection