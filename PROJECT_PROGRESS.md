# GOLEKERJO - PROJECT PROGRESS

## Informasi Proyek

Nama Proyek : Golekerjo

Framework : Laravel 12

Template Admin : Quixlab

Database : MySQL

Role User :

* Admin
* Author

---

# Struktur Menu Admin

* Dashboard
* Lowongan
* Kategori
* User
* Setting
* Logout

Menu disesuaikan berdasarkan dokumen analisis dan desain UI/UX yang telah disepakati tim.

---

# Progress Pengembangan

## Sprint 1 - Setup Project

### Selesai

* Laravel 12 berhasil diinstall
* Koneksi database MySQL berhasil
* Template Quixlab berhasil diintegrasikan
* Layout admin dibuat
* Layout frontend dibuat
* Dashboard admin berhasil ditampilkan

### Perubahan Sidebar

Sidebar bawaan Quixlab diubah menjadi:

* Dashboard
* Lowongan
* Kategori
* User
* Setting
* Logout

---

## Sprint 2 - Modul Kategori

### Database

Tabel categories dibuat dengan struktur:

* id
* name
* slug
* created_at
* updated_at

### Fitur Selesai

#### Create

* Tambah kategori
* Validasi nama kategori unik
* Generate slug otomatis

#### Read

* Menampilkan daftar kategori dari database
* Pagination Laravel

#### Update

* Edit kategori
* Update slug otomatis

#### Delete

* Hapus kategori

### UI

Halaman kategori disesuaikan dengan desain UI/UX terbaru:

* Tombol Tambah Kategori
* Pencarian kategori
* Tabel data kategori
* Tombol Edit
* Tombol Delete
* Pagination

### Catatan

* Pada versi berikutnya kategori yang sudah digunakan oleh data lowongan tidak dapat dihapus.
* Jumlah lowongan per kategori akan dihitung dari relasi tabel jobs.

---

## Sprint 3 - Modul Lowongan

### Database

Tabel job_posts dibuat dengan struktur:

* id
* title
* slug
* company
* logo
* category_id
* education
* experience
* gender
* location
* address
* salary_min
* salary_max
* description
* requirements
* contact_email
* contact_phone
* is_premium
* status
* expired_at
* views
* user_id
* created_at
* updated_at

### Relasi

Category
↓
Job

Satu kategori dapat memiliki banyak lowongan.

Job
↓
User

Satu lowongan dibuat oleh satu user.

---

### Fitur Selesai

#### Create

* Tambah lowongan baru
* Generate slug otomatis
* Validasi data lowongan
* Relasi kategori
* Relasi user login

#### Upload Logo

* Upload logo perusahaan
* Penyimpanan file menggunakan Laravel Storage
* Storage Link berhasil dibuat
* Logo tersimpan ke folder storage/app/public/jobs

#### Read

* Menampilkan daftar lowongan dari database
* Relasi kategori tampil pada tabel
* Status premium tampil
* Status aktif/nonaktif tampil
* Tanggal expired tampil
* Pagination Laravel

#### Update

* Edit lowongan
* Menampilkan data lama otomatis
* Update data lowongan
* Update logo perusahaan
* Hapus logo lama saat logo diganti

#### Delete

* Hapus lowongan
* Hapus file logo saat data dihapus
* Notifikasi sukses setelah penghapusan

---

### Perbaikan dan Debugging

#### Route Resource

Masalah:

* POST menuju jobs/create
* Method Not Allowed

Penyelesaian:

* Route resource diperbaiki
* Route store berhasil mengarah ke jobs.store

#### Foreign Key User

Masalah:

* user_id gagal disimpan
* Foreign key constraint gagal

Penyelesaian:

* Auth::id() diterapkan
* User login berhasil tersimpan pada job_posts.user_id

#### Upload Logo

Masalah:

* Logo tersimpan NULL

Penyelesaian:

* Validasi file logo ditambahkan
* Upload file Laravel Storage diterapkan
* Path logo berhasil tersimpan ke database

#### Edit Lowongan

Masalah:

* Data tidak tampil pada form edit
* Textarea description dan requirements kosong
* Dropdown tidak memilih data lama

Penyelesaian:

* Seluruh field menggunakan old() + data database
* Select kategori, pendidikan, pengalaman, gender, premium, status diperbaiki
* Preview logo lama berhasil ditampilkan

#### Update Lowongan

Masalah:

* Data tidak terlihat berubah

Penyelesaian:

* Route update diverifikasi
* Request berhasil diterima controller
* Query update berhasil dieksekusi
* Data berhasil diperbarui di database

---

# Keputusan Arsitektur

## Salary

Field:

* salary_min
* salary_max

Keputusan:

* Gaji tidak wajib diisi
* Jika salary_min dan salary_max kosong maka frontend menampilkan:

  "Gaji Kompetitif"

---

## Premium Job

Field:

* is_premium

Digunakan untuk:

* Menampilkan lowongan unggulan pada homepage
* Prioritas tampil pada daftar lowongan

---

## Expired Job

Field:

* expired_at

Digunakan untuk:

* Menentukan masa aktif lowongan
* Lowongan kadaluarsa tidak ditampilkan pada frontend

---

# Tahap Berikutnya

## Sprint 4 - Frontend Website

Target:

### Homepage

* Hero Section
* Search Lowongan
* Lowongan Premium
* Daftar Lowongan Terbaru
* Filter Kategori

### Detail Lowongan

* Informasi Perusahaan
* Logo Perusahaan
* Deskripsi Pekerjaan
* Syarat / Kualifikasi
* Informasi Kontak
* Gaji
* Status Premium

### Pencarian

* Search berdasarkan judul
* Search berdasarkan perusahaan
* Filter kategori

### Statistik

* Views Lowongan
* Hitung jumlah lowongan per kategori

---

# Status Proyek Saat Ini

Progress Keseluruhan:

✅ Setup Project

✅ Modul Kategori (CRUD)

✅ Modul Lowongan (CRUD + Upload Logo)

🔄 Frontend Homepage

⏳ Detail Lowongan

⏳ Search & Filter

⏳ Modul User

⏳ Modul Setting
