@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        <div class="card-header d-flex justify-content-between align-items-center px-0">

                            <h4 class="card-title mb-0">
                                Kategori
                            </h4>

                            <a href="{{ route('categories.create') }}"
                               class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Tambah Kategori
                            </a>

                        </div>

                        <hr>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="row mb-3">

                            <div class="col-md-4 ml-auto">

                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>

                                    <input type="text"
                                           class="form-control"
                                           placeholder="Cari kategori...">

                                </div>

                            </div>

                        </div>

                        <div class="table-responsive">

                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th width="80">No</th>
                                        <th>Nama Kategori</th>
                                        <th width="180">Jumlah Lowongan</th>
                                        <th width="150">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @forelse($categories as $category)

                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $category->name }}</td>

                                        <td>0</td>

                                        <td>

                                            <a href="{{ route('categories.edit', $category->id) }}"
                                               class="btn btn-sm btn-light">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                method="POST"
                                                style="display:inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                                                    <i class="fa fa-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Belum ada data kategori
                                        </td>
                                    </tr>

                                @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection