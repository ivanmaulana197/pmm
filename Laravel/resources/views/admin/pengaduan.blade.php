@extends('admin.layouts.master')

@section('content')
<div class="row g-3 mb-3">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button class="btn-close close" type="button" aria-label="Close" data-dismiss="alert"></button>
        <strong>{{ $message }}</strong>
    </div>

    @endif
    <div class="card">
        <div class="card-body">
            <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">List Pengaduan</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>List Pengaduan</h3>
        </div>
        <div class="card-body">

            <table class="data-table table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama Pengadu</th>
                        <th>Deskripsi Pengaduan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->pengaduan }}</td>
                        <td>
                            @if ( $data->status == "Belum Selesai")
                            <span class="badge badge-soft-warning">{{ $data->status }}</span>
                            @else
                            <span class="badge badge-soft-success">{{ $data->status }}</span>
                            @endif
                        </td>
                        <td>
                            <button class="badge bg-primary border-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#detail{{ $data->id }}">
                                <span class="far fa-envelope" data-fa-transform="shrink-3"></span> Lihat</button>

                            {{-- <a href="{{route('category.edit', $category->slug)}}"
                                class="badge bg-warning text-decoration-none"><span class="bi bi-pencil"></span>
                                Edit</a>
                            <form action="{{ route('category.destroy', [$category->slug]) }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger"><span class="bi bi-trash"></span> Delete</button>
                            </form> --}}
                            <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document"
                                    style="max-width: 600px">
                                    <div class="modal-content position-relative">
                                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                            <button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('updatePengaduan', $data->id) }}" method="post" enctype="multipart/form-data">
                                            
                                            @csrf
                                            <div class="modal-body p-0">
                                                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                                    <h4 class="mb-1" id="modalExampleDemoLabel">Lihat Pesan </h4>
                                                </div>
                                                <div class="p-4 pb-0">
                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="nama">Nama:</label>
                                                        <input class="form-control" id="nama" type="text" name="nama"
                                                            value="{{ $data->nama }}" disabled />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="pengaduan">Pengaduan:</label>
                                                        <textarea class="form-control" id="pengaduan" type="text" name="pengaduan" disabled> {{ $data->pengaduan }}</textarea>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="status">Status</label>
                                                        <div class="col-md-6">
                                                            <select class="form-select form-control @error('status') is-invalid @enderror" name="status" data-style="btn-outline-primary" data-size="5">
                                                                @if($data->status=='Belum Selesai')
                                                                <option selected>Belum Selesai</option>
                                                                <option>Selesai</option>
                                                                @else
                                                                <option>Belum Selesai</option>
                                                                <option selected>Selesai</option>
                                                                @endif
                                                            </select>
                                                            <small class="text-danger">@error('status') {{$message}} @enderror</small>
                                                        </div>
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