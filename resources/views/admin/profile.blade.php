@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <div class="card-header px-0">
                    <h4 class="card-title">Profile Saya</h4>
                </div>

                <hr>

                <form action="{{ route('profile.update') }}"
                      method="POST">

                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label>Nama</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', auth()->user()->name) }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', auth()->user()->email) }}"
                               required>
                    </div>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                </form>

            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">

                <div class="card-header px-0">
                    <h4 class="card-title">
                        Ubah Password
                    </h4>
                </div>

                <hr>

                @if (session('status') === 'password-updated')
                    <div class="alert alert-success">
                        Password berhasil diperbarui.
                    </div>
                @endif
                @if ($errors->updatePassword->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->updatePassword->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST"
                    action="{{ route('password.update') }}">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Password Saat Ini</label>

                        <input type="password"
                            name="current_password"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>

                        <input type="password"
                            name="password"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>

                        <input type="password"
                            name="password_confirmation"
                            class="form-control"
                            required>
                    </div>

                    <button type="submit"
                            class="btn btn-primary">
                        Update Password
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection