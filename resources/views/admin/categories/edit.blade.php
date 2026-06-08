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
                                Edit Kategori
                            </h4>

                            <a href="{{ route('categories.index') }}"
                               class="btn btn-secondary">
                                <i class="fa fa-arrow-left"></i>
                                Kembali
                            </a>

                        </div>

                        <hr>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('categories.update', $category->id) }}"
                              method="POST">

                            @csrf
                            @method('PUT')

                            <div class="form-group">

                                <label>Nama Kategori</label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name', $category->name) }}"
                                       required>

                            </div>

                            <div class="mt-4">

                                <button type="submit"
                                        class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Update
                                </button>

                                <a href="{{ route('categories.index') }}"
                                   class="btn btn-light">
                                    Batal
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection