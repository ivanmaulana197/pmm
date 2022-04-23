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

                    <li class="breadcrumb-item active" aria-current="page">Proyek Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>List Proyek Desa</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{route('proyek-desa.create')}}">
                    <button class="btn btn-primary" type="button">
                        <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Proyek Desa</button>
                </a>
            </div>
            <table class="data-table table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyeks as $proyek)
                    <tr>
                        <td>{{ $proyek->namaKegiatan }}</td>
                        <td>{{ $proyek->lokasi }}</td>

                        <td>
                            <a href="{{ route('proyek-desa.show', $proyek->slug) }}" class="badge badge-soft-info">
                                <i class="bi bi-eye"></i> Detail</a>
                            <a href="{{route('proyek-desa.edit', $proyek->slug)}}"
                                class="badge badge-soft-warning"><span class="bi bi-pencil"></span>
                                Edit</a>
                            <form action="{{ route('proyek-desa.destroy', [$proyek->slug]) }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge badge-soft-danger"><span class="bi bi-trash"></span> Delete</button>
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