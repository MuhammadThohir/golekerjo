@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <div class="card-header px-0">
                    <h4 class="card-title">Tambah User</h4>
                </div>

                <hr>

                <form action="{{ route('users.store') }}"
                      method="POST"
                      autocomplete="off">

                    @csrf

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               autocomplete="off"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               autocomplete="off"                               
                               required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>

                        <select name="role"
                                class="form-control"
                                required>

                            <option value="">Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="employer">Employer</option>

                        </select>

                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               autocomplete="new-password"
                               required>
                    </div>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('users.index') }}"
                       class="btn btn-light">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection