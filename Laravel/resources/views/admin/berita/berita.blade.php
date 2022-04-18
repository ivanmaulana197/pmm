@extends('admin.layouts.master')

@section('content')

<div class="row g-3">
    <div class="card">
        <div class="card-body">
            <nav style="--falcon-breadcrumb-divider: '»';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>List Category</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{route('category.create')}}">
                    <button class="btn btn-primary" type="button">
                        <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Kategori</button>
                </a>
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
                        <td>{{ $category->nama_category }}</td>

                        <td>
                            <a href="{{route('category.edit', $category->slug)}}"
                                class="badge bg-warning text-decoration-none"><span class="bi bi-pencil"></span>
                                Edit</a>
                            <form action="{{ route('category.destroy', [$category->slug]) }}" method="POST"
                                class="d-inline">
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
    <div class="card">
        <div class="card-header">
            <h3>List Berita</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="/admin/berita/add">
                    <button class="btn btn-primary" type="button">
                        <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Berita</button>
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
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->nama_category }}</td>
                        <td>
                            @if ( $post->status == "Draft")
                            <span class="badge badge-soft-warning">{{ $post->status }}</span>
                            @else
                            <span class="badge badge-soft-success">{{ $post->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="berita/{{ $post->slug }}" class="badge badge-soft-info">
                                <i class="bi bi-eye"></i> Detail</a>
                            <a href="berita/edit/{{ $post->slug }}" class="badge badge-soft-warning">
                                <i class="bi bi-pencil"></i>Edit</a>
                            <form action="{{ route('hapus-berita', [$post->slug]) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger"><span class="bi bi-trash"></span> Delete</button>
                            </form>
                            {{-- <form action="#" method="POST">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger"> <i class="bi bi-trash"></i> Delete</button>
                            </form> --}}
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