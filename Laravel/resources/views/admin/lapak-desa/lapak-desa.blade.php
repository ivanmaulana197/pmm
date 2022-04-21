@extends('admin.layouts.master')

@section('content')

<div class="row g-3">
    <div class="card">
        <div class="card-body">
            <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Lapak Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>List Kategori Lapak Desa</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahCategory">
                    <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Aparatur</button>

                <div class="modal fade" id="tambahCategory" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px">
                        <div class="modal-content position-relative">
                            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('category-lapak.store') }}" method="post">
                                @csrf
                                <div class="modal-body p-0">
                                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                        <h4 class="mb-1" id="modalExampleDemoLabel">Tambah kategori </h4>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <div class="mb-3">
                                            <label class="col-form-label" for="nama">Nama:</label>
                                            <input class="form-control" id="nama" type="text" name="namaCategory" />
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
            <table class="data-table table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->namaCategory }}</td>

                        <td>
                            <button class="badge bg-warning text-decoration-none" type="button" data-bs-toggle="modal"
                                data-bs-target="#editCaegory{{ $category->id }}"><span class="bi bi-pencil"
                                    data-fa-transform="shrink-3"></span>Edit</button>
                            <form action="{{ route('category-lapak.destroy', [$category->slug]) }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger"><span class="bi bi-trash"></span> Delete</button>
                            </form>
                        </td>
                        <div class="modal fade" id="editCaegory{{ $category->id }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 600px">
                                <div class="modal-content position-relative">
                                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                        <button
                                            class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('category-lapak.update', $category->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body p-0">
                                            <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                <h4 class="mb-1" id="modalExampleDemoLabel">Edit Kategori </h4>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <div class="mb-3">
                                                    <label class="col-form-label" for="namaCategory">Nama Kategori:</label>
                                                    <input class="form-control @error('namaCategory') is-invalid @enderror" id="namaCategory" type="text" name="namaCategory"
                                                        value="{{ $category->namaCategory }}" />
                                                        <small class="text-danger">@error('namaCategory') {{$message}} @enderror</small>
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
    <div class="card">
        <div class="card-header">
            <h3>List Lapak Desa</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('lapak-desa.create') }}">
                    <button class="btn btn-primary" type="button">
                        <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Lapak Desa</button>
                </a>
            </div>
            <table class="data-table table table-striped" id="table2">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lapaks as $lapak)
                    <tr>
                        <td>{{ $lapak->namaLapak }}</td>
                        
                        <td>{{ $lapak->category->namaCategory }}</td>
                        <td>
                           {{ $lapak->harga }}
                        </td>
                        <td>
                            <a href="{{ route('lapak-desa.show', $lapak->slug) }}" class="badge badge-soft-info">
                                <i class="bi bi-eye"></i> Detail</a>
                            <a href="{{ route('lapak-desa.edit', $lapak->slug) }}" class="badge badge-soft-warning">
                                <i class="bi bi-pencil"></i>Edit</a>
                            <form action="{{ route('lapak-desa.destroy', [$lapak->slug]) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger"><span class="bi bi-trash"></span> Delete</button>
                            </form>

                        </td>
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
    let table1 = document.querySelector('#table1');
    let table2 = document.querySelector('#table2');
    let dataTable1 = new simpleDatatables.DataTable(table1);
    let dataTable2 = new simpleDatatables.DataTable(table2);

</script>
@endsection