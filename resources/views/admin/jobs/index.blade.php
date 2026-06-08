@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

```
    <div class="card">

        <div class="card-body">

            <div class="card-header d-flex justify-content-between align-items-center px-0">

                <h4 class="card-title mb-0">
                    Lowongan
                </h4>

                <a href="{{ route('jobs.create') }}"
                   class="btn btn-primary">

                    <i class="fa fa-plus"></i>
                    Tambah Lowongan

                </a>

            </div>

            <hr>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        <span>&times;</span>

                    </button>
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
                               placeholder="Cari lowongan...">

                    </div>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Perusahaan</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Premium</th>
                            <th>Status</th>
                            <th>Expired</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($jobs as $job)

                        <tr>

                            <td>{{ $job->title }}</td>

                            <td>{{ $job->company }}</td>

                            <td>
                                {{ $job->category->name ?? '-' }}
                            </td>

                            <td>{{ $job->location }}</td>

                            <td>

                                @if($job->is_premium)

                                    <span class="badge badge-success">
                                        Ya
                                    </span>

                                @else

                                    <span class="badge badge-secondary">
                                        Tidak
                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($job->status)

                                    <span class="badge badge-success">
                                        Aktif
                                    </span>

                                @else

                                    <span class="badge badge-danger">
                                        Nonaktif
                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($job->expired_at)->format('d-m-Y') }}

                            </td>

                            <td>

                                <a href="{{ route('jobs.edit', $job->id) }}"
                                   class="btn btn-sm btn-light">

                                    <i class="fa fa-pencil"></i>

                                </a>

                                <form action="{{ route('jobs.destroy', $job->id) }}"
                                      method="POST"
                                      style="display:inline-block">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus lowongan ini?')">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="text-center">

                                Belum ada data lowongan

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $jobs->links() }}

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
