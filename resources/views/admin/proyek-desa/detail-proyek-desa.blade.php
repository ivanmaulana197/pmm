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
            <li class="breadcrumb-item active" aria-current="page">Proyek Desa: {{ $proyekDesa->namaKegiatan }}</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card mb-3">
      <div class=" carousel slide carousel-fade" id="controlStyledExample" data-ride="carousel">
        <div class="carousel-indicators">
          <button class="active" type="button" data-bs-target="#controlStyledExample" data-bs-slide-to="0"
            aria-current="true" aria-label="Slide 0"></button>
        </div>
        <div class="carousel-inner rounded">
          <div class="carousel-item active">
            <a class="post1" href="{{ $proyekDesa->gambar }}" data-gallery="gallery-1">
              <img class="card-img-top" src="{{ $proyekDesa->gambar }}" alt="" />
            </a>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#controlStyledExample"
          data-bs-slide="prev">
          <span class="fas fa-angle-left"></span> <span class="sr-only">Previous</span> </button>
        <button class="carousel-control-next" type="button" data-bs-target="#controlStyledExample"
          data-bs-slide="next">
          <span class="fas fa-angle-right"></span><span class="sr-only">Next</span> </button>

      </div>




    
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="mb-3">
        
          <a href="{{ route('proyek-desa.index') }}" class="btn btn-falcon-default me-1 mb-1">
            <i class="fas fa-arrow-left"></i> Kembali</a>
          <a href="{{route('proyek-desa.edit', $proyekDesa->slug)}}" class="btn btn-warning me-1 mb-1">
            <i class="bi bi-pencil"></i> Edit</a>
          <form action="{{ route('proyek-desa.destroy', [$proyekDesa->slug]) }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger me-1 mb-1"><span class="bi bi-trash"></span> Delete</button>
          </form>
        </div>
        <table class="table">
			<tbody>
				<tr><td>Nama Kegiatan</td><td>:</td><td>{{ $proyekDesa->namaKegiatan }}</td></tr>
				<tr><td>Lokasi</td><td>:</td><td>{{ $proyekDesa->lokasi }}</td></tr>
				<tr><td>Anggaran</td><td>:</td><td>Rp. {{ number_format($proyekDesa->anggaran,2,',','.'); }}</td></tr>
				<tr><td>Volume</td><td>:</td><td>{{ $proyekDesa->volume }} m2</td></tr>
				<tr><td>Sumber Dana</td><td>:</td><td>{{ $proyekDesa->sumberDana }}</td></tr>
				<tr><td>Tahun</td><td>:</td><td>{{ $proyekDesa->tahun }}</td></tr>
				<tr><td>Pelaksana</td><td>:</td><td>{{ $proyekDesa->pelaksana }}</td></tr>
				<tr><td>Manfaat</td><td>:</td><td>{{ $proyekDesa->manfaat }}</td></tr>
				<tr><td>Keterangan</td><td>:</td><td>{{ $proyekDesa->keterangan }}</td></tr>
			</tbody>
			</table>
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
          <button class="btn btn-primary" type="submit">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection