@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                <div class="card-header d-flex justify-content-between align-items-center px-0">

                    <h4 class="card-title mb-0">
                        Detail Lowongan
                    </h4>

                    <a href="{{ route('jobs.index') }}"
                       class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i>
                        Kembali
                    </a>

                </div>


                <hr>

                <div class="card">
                    <div class="card-body">

                
                        <div class="row align-items-center">

                            <div class="col-md-2 text-center">

                                @if($job->logo)
                                    <img src="{{ asset('storage/'.$job->logo) }}"
                                        class="img-fluid"
                                        style="max-height:100px;">
                                @else
                                    <div class="text-muted">
                                        Tidak Ada Logo
                                    </div>
                                @endif

                            </div>

                            <div class="col-md-7">

                                <h3 class="mb-2">
                                    {{ $job->title }}
                                </h3>

                                <h5 class="text-muted mb-3">
                                    {{ $job->company }}
                                </h5>

                                <div class="mb-2">

                                    <span class="badge badge-light mr-2">
                                        {{ $job->category->name }}
                                    </span>

                                    <span class="badge badge-light">
                                        {{ $job->location }}
                                    </span>

                                    

                                </div>

                            </div>

                            <div class="col-md-3 text-md-right">

                                @if($job->status == 0)

                                    <span class="badge badge-warning px-3 py-2">
                                        Menunggu Review
                                    </span>

                                @elseif($job->status == 1)

                                    <span class="badge badge-success px-3 py-2">
                                        Lowongan Aktif
                                    </span>

                                @else

                                    <span class="badge badge-danger px-3 py-2">
                                        Lowongan Nonaktif
                                    </span>

                                @endif

                                <br><br>

                                @if($job->is_premium)

                                    <span class="badge badge-success px-3 py-2">
                                        <i class="fa fa-star"></i>
                                        Premium
                                    </span>

                                @else

                                    <span class="badge badge-secondary px-3 py-2">
                                        Biasa
                                    </span>

                                @endif
                                <br><br>
                                @php
                                    $daysLeft = (int) now()->startOfDay()->diffInDays(
                                        \Carbon\Carbon::parse($job->expired_at)->startOfDay(),
                                        false
                                    );
                                @endphp

                                @if($daysLeft < 0)

                                    <span class="badge badge-danger">
                                        Expired
                                    </span>

                                @elseif($daysLeft <= 7)

                                    <span class="badge badge-warning">
                                        {{ $daysLeft }} Hari Lagi
                                    </span>

                                @elseif($daysLeft <= 30)

                                    <span class="badge badge-info">
                                        {{ $daysLeft }} Hari Lagi
                                    </span>

                                @else

                                    <span class="badge badge-success">
                                        {{ $daysLeft }} Hari Lagi
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>
                
                </div>

                <div class="card mt-4">
                    <div class="card-body">

                
                        <h4 class="card-title">
                            Informasi Lowongan
                        </h4>

                        <hr>

                        <div class="row">

                            <div class="col-md-6">

                                <table class="table table-borderless">

                                    <tr>
                                        <th width="180">Pendidikan</th>
                                        <td>{{ $job->education }}</td>
                                    </tr>

                                    <tr>
                                        <th>Pengalaman</th>
                                        <td>{{ $job->experience }}</td>
                                    </tr>

                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $job->gender }}</td>
                                    </tr>

                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $job->address }}</td>
                                    </tr>

                                    <tr>
                                        <th>Gaji</th>
                                        <td>
                                            Rp {{ number_format($job->salary_min,0,',','.') }}
                                            -
                                            Rp {{ number_format($job->salary_max,0,',','.') }}
                                        </td>
                                    </tr>

                                </table>

                            </div>

                            <div class="col-md-6">

                                <table class="table table-borderless">

                                    <tr>
                                        <th width="180">Email</th>
                                        <td>{{ $job->contact_email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Telepon</th>
                                        <td>{{ $job->contact_phone }}</td>
                                    </tr>

                                    <tr>
                                        <th>Expired</th>
                                        <td>
                                            {{ \Carbon\Carbon::parse($job->expired_at)->format('d-m-Y') }}
                                        </td>
                                    </tr>

                                    

                                    <tr>
                                        <th>Dibuat Oleh</th>
                                        <td>{{ $job->user->name ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Tanggal Dibuat</th>
                                        <td>
                                            {{ $job->created_at->format('d-m-Y H:i') }}
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                    </div>
                

                </div>

                
                

            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">

                <h4 class="card-title">
                    Deskripsi Pekerjaan
                </h4>

                <hr>

                {!! nl2br(e($job->description)) !!}

            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">

                <h4 class="card-title">
                    Syarat & Kualifikasi
                </h4>

                <hr>

                {!! nl2br(e($job->requirements)) !!}

            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">

                <h4 class="card-title">
                    Review Admin
                </h4>

                <hr>

                <div class="row">

                    {{-- STATUS LOWONGAN --}}
                    <div class="col-md-6 mb-4">

                        <h5 class="mb-3">
                            Status Lowongan
                        </h5>

                        @if($job->status == 0)

                            <span class="badge badge-warning px-3 py-2">
                                Menunggu Review
                            </span>

                        @elseif($job->status == 1)

                            <span class="badge badge-success px-3 py-2">
                                Lowongan Aktif
                            </span>

                        @else

                            <span class="badge badge-danger px-3 py-2">
                                Lowongan Nonaktif
                            </span>

                        @endif

                        @if(Auth::user()->role == 'admin')

                            <div class="mt-3">

                                @if($job->status == 0)

                                    <form action="{{ route('jobs.activate', $job) }}"
                                        method="POST"
                                        class="mb-2">
                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-success btn-block">
                                            Aktifkan
                                        </button>
                                    </form>

                                    <form action="{{ route('jobs.deactivate', $job) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-danger btn-block">
                                            Tolak / Nonaktifkan
                                        </button>
                                    </form>

                                @elseif($job->status == 1)

                                    <form action="{{ route('jobs.deactivate', $job) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-warning btn-block">
                                            Nonaktifkan
                                        </button>
                                    </form>

                                @elseif($job->status == 2)

                                    <form action="{{ route('jobs.activate', $job) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-success btn-block">
                                            Aktifkan Kembali
                                        </button>
                                    </form>

                                @endif

                            </div>

                        @endif

                    </div>

                    {{-- STATUS PREMIUM --}}
                    <div class="col-md-6 mb-4">

                        <h5 class="mb-3">
                            Status Premium
                        </h5>

                        @if($job->is_premium)

                            <span class="badge badge-success px-3 py-2">
                                Premium
                            </span>

                        @else

                            <span class="badge badge-secondary px-3 py-2">
                                Tidak Premium
                            </span>

                        @endif

                        @if(Auth::user()->role == 'admin')

                            <div class="mt-3">

                                @if(!$job->is_premium)

                                    <form action="{{ route('jobs.premium', $job) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-info btn-block">
                                            Jadikan Premium
                                        </button>
                                    </form>

                                @else

                                    <form action="{{ route('jobs.unpremium', $job) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-secondary btn-block">
                                            Batalkan Premium
                                        </button>
                                    </form>

                                @endif

                            </div>

                        @endif

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection