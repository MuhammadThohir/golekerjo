@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <div class="card-header d-flex justify-content-between align-items-center px-0">

                    <h4 class="card-title mb-0">
                        Tambah Lowongan
                    </h4>

                    <a href="{{ route('jobs.index') }}"
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
                <form action="{{ route('jobs.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

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

                                <select name="category_id"
                                        class="form-control">

                                    <option value="">
                                        Pilih Kategori
                                    </option>

                                    @foreach($categories as $category)

                                        <option value="{{ $category->id }}">
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
                                         src="https://placehold.co/150x150?text=No+Logo"
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

                                    <option>SMA / SMK</option>
                                    <option>D1 - D3</option>
                                    <option>S1 / D4</option>
                                    <option>S2 / Profesi</option>
                                    <option>Bebas</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>Pengalaman</label>

                                <select name="experience"
                                        class="form-control">

                                    <option>Tanpa Pengalaman</option>
                                    <option>1 - 2 Tahun</option>
                                    <option>3 - 4 Tahun</option>
                                    <option>5 Tahun Lebih</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label>Gender</label>

                                <select name="gender"
                                        class="form-control">

                                    <option value="all">
                                        Pria / Wanita
                                    </option>

                                    <option value="male">
                                        Pria
                                    </option>

                                    <option value="female">
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
                                  class="form-control"></textarea>

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
                                  class="form-control"
                                  placeholder="Contoh:

PT ABC membuka lowongan Staff Keuangan.

Tugas:
- Membuat laporan keuangan
- Mengelola transaksi harian
- Menyusun arsip dokumen"></textarea>

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
                                  class="form-control"
                                  placeholder="Contoh:

- Pria / Wanita
- Pendidikan minimal SMA/SMK
- Mahir Microsoft Office
- Jujur dan bertanggung jawab"></textarea>

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
                                       class="form-control">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Nomor Telepon</label>

                                <input type="text"
                                       name="contact_phone"
                                       class="form-control">

                            </div>

                        </div>

                    </div>

                    <hr>

                    <!-- ========================= -->
                    <!-- PUBLIKASI -->
                    <!-- ========================= -->
                    @if(auth()->user()->role == 'admin')

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

                                    <option value="0">
                                        Tidak Premium
                                    </option>

                                    <option value="1">
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

                                    <option value="1">
                                        Aktif
                                    </option>

                                    <option value="0">
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
                                    value="{{ now()->addDays(30)->format('Y-m-d') }}">

                                <small class="text-muted">
                                    Setelah tanggal ini lowongan otomatis tidak ditampilkan.
                                </small>

                            </div>

                        </div>

                    </div>
                    
                    <hr>
                    @endif

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