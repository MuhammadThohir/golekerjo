@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <div class="card-header px-0">
                    <h4 class="card-title">Edit User</h4>
                </div>

                <hr>

                <form action="{{ route('users.update', $user->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $user->name) }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $user->email) }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>

                        <select name="role"
                                class="form-control"
                                required>

                            <option value="admin"
                                {{ $user->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="employer"
                                {{ $user->role == 'employer' ? 'selected' : '' }}>
                                Employer
                            </option>

                        </select>

                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>

                        <input type="password"
                               name="password"
                               class="form-control">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengubah password.
                        </small>
                    </div>

                    <button type="submit"
                            class="btn btn-primary">
                        Update
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