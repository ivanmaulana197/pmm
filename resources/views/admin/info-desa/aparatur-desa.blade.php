@extends('admin.layouts.master')

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
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Aparatur Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>List Aparatur Desa</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">

                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahAparatur">
                    <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Aparatur</button>



                <div class="modal fade" id="tambahAparatur" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px">
                        <div class="modal-content position-relative">
                            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('aparatur.store') }}" method="post" enctype="multipart/form-data">
                                <div class="modal-body p-0">
                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                        <h4 class="mb-1" id="modalExampleDemoLabel">Tambah Aparatur </h4>
                                    </div>
                                    <div class="p-4 pb-0">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label" for="nama">Nama:</label>
                                            <input class="form-control" id="nama" type="text" name="nama" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="jabatan">Jabatan:</label>
                                            <input class="form-control" id="jabatan" type="text" name="jabatan" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="foto">Foto:</label>
                                            <input type="file" class="form-control" id="foto" name="gambar">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <button class="btn btn-primary" type="submit">Simpan </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="data-table table table-striped" id="table3">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($items as $aparatur)
                    <tr>

                        <td>{{ $aparatur->nama }}</td>
                        <td>{{ $aparatur->jabatan }}</td>
                        <td>
                            <a class="col-sm-4" href="{{ $aparatur->gambar }}"
                                data-gallery="gallery-{{ $aparatur->id }}">
                                <img src="{{ $aparatur->gambar }}"
                                    class="img-fluid img-thumbnail" alt="" width="160">
                            </a>
                        </td>

                        <td>

                            <button class="badge bg-warning text-decoration-none" type="button" data-bs-toggle="modal"
                                data-bs-target="#editAparatur{{ $aparatur->id }}"><span class="bi bi-pencil"
                                    data-fa-transform="shrink-3"></span>Edit</button>
                            <form action="{{ route('aparatur.destroy', $aparatur->id) }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger"><span class="bi bi-trash"></span> Delete</button>
                            </form>
                        </td>
                        {{-- modals --}}
                        <div class="modal fade" id="editAparatur{{ $aparatur->id }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px">
                                <div class="modal-content position-relative">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                        <button
                                            class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('aparatur.update', $aparatur->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body p-0">
                                            <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                <h4 class="mb-1" id="modalExampleDemoLabel">Edit Aparatur </h4>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="nama">Nama:</label>
                                                    <input class="form-control @error('nama') is-invalid @enderror" id="nama" type="text" name="nama"
                                                        value="{{ $aparatur->nama }}" />
                                                        <small class="text-danger">@error('nama') {{$message}} @enderror</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="jabatan">Jabatan:</label>
                                                    <input class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" type="text" name="jabatan"
                                                        value="{{ $aparatur->jabatan }}" />
                                                        <small class="text-danger">@error('jabatan') {{$message}} @enderror</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="gambar">Foto:</label>
                                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                                                    <small class="text-danger">@error('gambar') {{$message}} @enderror</small>
                                                    <a class="col-sm-4"
                                                        href="{{ asset('storage/aparatur/'.$aparatur->gambar) }}"
                                                        data-gallery="gallery-{{ $aparatur->id }}">
                                                        <img src="{{ $aparatur->gambar }}"
                                                            class="img-fluid img-thumbnail" alt="" width="200">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button class="btn btn-primary" type="submit">Simpan </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('js table')



<script>
    // Simple Datatable
    let table1 = document.querySelector('#table2');
    let table2 = document.querySelector('#table2');
    let dataTable1 = new simpleDatatables.DataTable(table3);
    let dataTable2 = new simpleDatatables.DataTable(table2);

</script>
@endsection