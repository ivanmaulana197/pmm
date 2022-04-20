@extends('admin.layouts.master')

@section('content')
<div class="row g-3">
  <div class="col-md-8">

    <div class="card mb-3">
      <div class="card-body">
        <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/berita">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita: {{ $post->title }}</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card mb-3">
      <div class=" carousel slide carousel-fade" id="controlStyledExample" data-ride="carousel">
        <div class="carousel-indicators">
          @foreach ($post->multipleImage as $i=>$image)

          @if ($i==0)
          <button class="active" type="button" data-bs-target="#controlStyledExample" data-bs-slide-to="{{ $i }}"
            aria-current="true" aria-label="Slide {{ $i }}"></button>
          @else
          <button type="button" data-bs-target="#controlStyledExample" data-bs-slide-to="{{ $i }}" aria-current="true"
            aria-label="Slide {{ $i }}"></button>
          @endif
 
          @endforeach

        </div>
        <div class="carousel-inner rounded">
          @foreach ($post->multipleImage as $i=>$image)
          @if ($i==0)
          <div class="carousel-item active">
            <a class="post1" href="{{ $image->path }}" data-gallery="gallery-1">
              <img class="card-img-top" src="{{ $image->path }}" alt="" />
            </a>
          </div>
          @else
          <div class="carousel-item">
            <a class="post1" href="{{ $image->path }}" data-gallery="gallery-1">
              <img class="card-img-top" src="{{ $image->path }}" alt="" />
            </a>
          </div>
          @endif
          @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#controlStyledExample"
          data-bs-slide="prev">
          <span class="fas fa-angle-left"></span> <span class="sr-only">Previous</span> </button>
        <button class="carousel-control-next" type="button" data-bs-target="#controlStyledExample"
          data-bs-slide="next">
          <span class="fas fa-angle-right"></span><span class="sr-only">Next</span> </button>

      </div>




      <div class="card-body">
        <div class="row justify-content-between align-items-center">
          <div class="col">
            <div class="d-flex">
              <div class="calendar me-2"><span class="calendar-month">{{ $post->created_at->isoFormat('MMM')
                  }}</span><span class="calendar-day">{{ $post->created_at->isoFormat('D') }} </span>
              </div>
              <div class="flex-1 fs--1">
                <h5 class="fs-0">{{ $post->title }}</h5>
                <p class="mb-0">by <a href="#!">{{ $post->user->name }}</a> • {{ $post->created_at->diffForHumans() }}
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-auto mt-4 mt-md-0">
            <button class="btn btn-falcon-default btn-sm me-2" type="button"><span
                class="fas fa-heart text-danger me-1"></span>{{ $post->like }}</button>
            <button class="btn btn-falcon-default btn-sm me-2" type="button"><span
                class="fas fa-share-alt me-1"></span>Share</button>

          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <a href="{{ route('berita') }}" class="btn btn-falcon-default me-1 mb-1">
            <i class="fas fa-arrow-left"></i> Kembali</a>
          <a href="edit/{{ $post->slug }}" class="btn btn-warning me-1 mb-1">
            <i class="bi bi-pencil"></i> Edit</a>
          <form action="{{ route('hapus-berita', [$post->slug]) }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger me-1 mb-1"><span class="bi bi-trash"></span> Delete</button>
          </form>
        </div>
        {!! $post->body !!}
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h5>Komentar</h5>
      </div>
      <div class="card-body">
        <form action="">
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlInput1">Email address</label>
            <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="name@example.com" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection