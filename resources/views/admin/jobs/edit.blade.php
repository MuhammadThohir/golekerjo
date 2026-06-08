@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <div class="card-header d-flex justify-content-between align-items-center px-0">

                    <h4 class="card-title mb-0">
                        Edit Lowongan
                    </h4>

                    <a href="{{ route('jobs.index') }}"
                       class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i>
                        Kembali
                    </a>

                </div>

                <hr>

                <form action="{{ route('jobs.update', $job->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <!-- ========================= -->
                    <!-- INFORMASI LOWONGAN -->
                    <!-- ========================= -->

                    <h5 class="mb-3">
                        Informasi Lowongan
                    </h5>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Judul Lowongan
                                </label>

                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       value="{{ old('title', $job->title) }}"
                                       placeholder="Contoh: Staff Administrasi">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Nama Perusahaan
                                </label>

                                <input type="text"
                                       name="company"
                                       class="form-control"
                                       value="{{ old('company', $job->company) }}"
                                       placeholder="Contoh: PT Maju Jaya">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Kategori
                                </label>

                                <select name="category_id" class="form-control">

                                    <option value="">
                                        Pilih Kategori
                                    </option>

                                    @foreach($categories as $category)

                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>

                                            {{ $category->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Logo Perusahaan
                                </label>

                                <input type="file"
                                       name="logo"
                                       id="logo"
                                       class="form-control">

                                <small class="text-muted">
                                    Format JPG, JPEG, PNG. Maksimal 2MB.
                                </small>

                            </div>

                            <div class="mt-3">

                                <label>
                                    Preview Logo
                                </label>

                                <div>

                                    <img id="logoPreview"
                                         src="{{ $job->logo ? asset('storage/'.$job->logo) : 'https://placehold.co/150x150?text=No+Logo' }}" 
                                         alt="Preview Logo"
                                         style="max-width:150px;
                                                border:1px solid #ddd;
                                                border-radius:8px;
                                                padding:5px;">

                                </div>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <!-- ========================= -->
                    <!-- KUALIFIKASI -->
                    <!-- ========================= -->

                    <h5 class="mb-3">
                        Kualifikasi
                    </h5>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>Pendidikan</label>

                                <select name="education"
                                        class="form-control">

                                    <option value="SMA / SMK"
                                        {{ old('education', $job->education) == 'SMA / SMK' ? 'selected' : '' }}>
                                        SMA / SMK
                                    </option>

                                    <option value="D1 - D3"
                                        {{ old('education', $job->education) == 'D1 - D3' ? 'selected' : '' }}>
                                        D1 - D3
                                    </option>

                                    <option value="S1 / D4"
                                        {{ old('education', $job->education) == 'S1 / D4' ? 'selected' : '' }}>
                                        S1 / D4
                                    </option>

                                    <option value="S2 / Profesi"
                                        {{ old('education', $job->education) == 'S2 / Profesi' ? 'selected' : '' }}>
                                        S2 / Profesi
                                    </option>

                                    <option value="Bebas"
                                        {{ old('education', $job->education) == 'Bebas' ? 'selected' : '' }}>
                                        Bebas
                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>Pengalaman</label>

                                <select name="experience"
                                    class="form-control">

                                <option value="Tanpa Pengalaman"
                                    {{ old('experience', $job->experience) == 'Tanpa Pengalaman' ? 'selected' : '' }}>
                                    Tanpa Pengalaman
                                </option>

                                <option value="1 - 2 Tahun"
                                    {{ old('experience', $job->experience) == '1 - 2 Tahun' ? 'selected' : '' }}>
                                    1 - 2 Tahun
                                </option>

                                <option value="3 - 4 Tahun"
                                    {{ old('experience', $job->experience) == '3 - 4 Tahun' ? 'selected' : '' }}>
                                    3 - 4 Tahun
                                </option>

                                <option value="5 Tahun Lebih"
                                    {{ old('experience', $job->experience) == '5 Tahun Lebih' ? 'selected' : '' }}>
                                    5 Tahun Lebih
                                </option>

                            </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>Gender</label>

                                <select name="gender"
                                    class="form-control">

                                <option value="all"
                                    {{ old('gender', $job->gender) == 'all' ? 'selected' : '' }}>
                                    Pria / Wanita
                                </option>

                                <option value="male"
                                    {{ old('gender', $job->gender) == 'male' ? 'selected' : '' }}>
                                    Pria
                                </option>

                                <option value="female"
                                    {{ old('gender', $job->gender) == 'female' ? 'selected' : '' }}>
                                    Wanita
                                </option>

                            </select>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <!-- ========================= -->
                    <!-- LOKASI DAN GAJI -->
                    <!-- ========================= -->

                    <h5 class="mb-3">
                        Lokasi dan Gaji
                    </h5>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Lokasi</label>

                                <input type="text"
                                       name="location"
                                       class="form-control"
                                       value="{{ old('location', $job->location) }}"
                                       placeholder="Contoh: Semarang">

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Gaji Dari</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Rp
                                            </span>
                                        </div>

                                        <input type="number"
                                            name="salary_min"
                                            class="form-control"
                                            value="{{ old('salary_min', $job->salary_min) }}"
                                            placeholder="Contoh: 3000000">

                                    </div>

                                    <small class="text-muted">
                                        Isi 0 jika gaji tidak dicantumkan.
                                    </small>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Gaji Sampai</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Rp
                                            </span>
                                        </div>

                                        <input type="number"
                                            name="salary_max"
                                            class="form-control"
                                            value="{{ old('salary_max', $job->salary_max) }}"
                                            placeholder="Contoh: 5000000">

                                    </div>

                                    <small class="text-muted">
                                        Isi 0 jika gaji tidak dicantumkan.
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label>Alamat Lengkap</label>

                        <textarea name="address"
                                  rows="3"
                                  class="form-control">{{ old('address',$job->address) }}</textarea>

                    </div>

                    <hr>

                    <!-- ========================= -->
                    <!-- DESKRIPSI -->
                    <!-- ========================= -->

                    <h5 class="mb-3">
                        Deskripsi Pekerjaan
                    </h5>

                    <div class="form-group">

                        <textarea name="description"
                                  rows="6"
                                  class="form-control">{{ old('description', $job->description) }}</textarea>

                    </div>

                    <hr> 

                    <!-- ========================= -->
                    <!-- SYARAT -->
                    <!-- ========================= -->

                    <h5 class="mb-3">
                        Syarat / Kualifikasi
                    </h5>

                    <div class="form-group">

                        <textarea name="requirements"
                                  rows="6"
                                  class="form-control">{{ old('requirements', $job->requirements) }}</textarea>

                    </div>

                    <hr>

                    <!-- ========================= -->
                    <!-- KONTAK -->
                    <!-- ========================= -->

                    <h5 class="mb-3">
                        Kontak
                    </h5>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Email Kontak</label>

                                <input type="email"
                                       name="contact_email"
                                       class="form-control"
                                       value="{{ old('contact_email', $job->contact_email) }}">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Nomor Telepon</label>

                                <input type="text"
                                       name="contact_phone"
                                       class="form-control"
                                       value="{{ old('contact_phone', $job->contact_phone) }}">

                            </div>

                        </div>

                    </div>

                    <hr>

                    <!-- ========================= -->
                    <!-- PUBLIKASI -->
                    <!-- ========================= -->

                    <h5 class="mb-3">
                        Publikasi
                    </h5>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>
                                    Status Premium
                                </label>

                                <select name="is_premium"
                                        class="form-control">

                                    <option value="0" {{ old('is_premium', $job->is_premium) == 0 ? 'selected' : '' }}>
                                        Tidak Premium
                                    </option>

                                    <option value="1" {{ old('is_premium', $job->is_premium) == 1 ? 'selected' : '' }}>
                                        Premium
                                    </option>

                                </select>

                                <small class="text-muted">
                                    Lowongan premium dapat ditampilkan pada bagian unggulan.
                                </small>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>
                                    Status Publikasi
                                </label>

                                <select name="status"
                                        class="form-control">
                                        value="{{ old('status', $job->status) }}">

                                    <option value="1" {{ old('status', $job->status) == 1 ? 'selected' : '' }}>
                                        Aktif
                                    </option>

                                    <option value="0" {{ old('status', $job->status) == 0 ? 'selected' : '' }}>
                                        Nonaktif
                                    </option>

                                </select>

                                <small class="text-muted">
                                    Lowongan nonaktif tidak tampil di website.
                                </small>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>
                                    Tanggal Expired
                                </label>

                                <input type="date"
                                    name="expired_at"
                                    class="form-control"
                                    value="{{ old('expired_at', $job->expired_at->format('Y-m-d')) }}">

                                <small class="text-muted">
                                    Setelah tanggal ini lowongan otomatis tidak ditampilkan.
                                </small>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="text-right">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fa fa-save"></i>
                            Simpan Lowongan

                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<script>

document.getElementById('logo')
.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(event){

            document.getElementById('logoPreview').src =
                event.target.result;

        }

        reader.readAsDataURL(file);
    }

});

</script>

@endsection