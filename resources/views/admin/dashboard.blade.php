@extends('layout.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">

        {{-- CARD 1 --}}
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body d-flex align-items-center">

                    <div class="mr-3">
                        <i class="fa fa-briefcase fa-3x text-primary"></i>
                    </div>

                    <div>
                        <h6 class="mb-1">
                            {{ auth()->user()->role == 'admin' ? 'Total Lowongan' : 'Lowongan Saya' }}
                        </h6>

                        <h2 class="mb-0">
                            {{ $totalJobs }}
                        </h2>
                    </div>

                </div>
            </div>
        </div>

        {{-- CARD 2 --}}
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body d-flex align-items-center">

                    <div class="mr-3">
                        <i class="fa fa-check-circle fa-3x text-success"></i>
                    </div>

                    <div>
                        <h6 class="mb-1">
                            Lowongan Aktif
                        </h6>

                        <h2 class="mb-0">
                            {{ $activeJobs }}
                        </h2>
                    </div>

                </div>
            </div>
        </div>

        {{-- CARD 3 --}}
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body d-flex align-items-center">

                    <div class="mr-3">
                        <i class="fa fa-clock-o fa-3x text-warning"></i>
                    </div>

                    <div>
                        <h6 class="mb-1">
                            Pending Review
                        </h6>

                        <h2 class="mb-0">
                            {{ $pendingJobs }}
                        </h2>
                    </div>

                </div>
            </div>
        </div>

        {{-- CARD 4 --}}
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body d-flex align-items-center">

                    <div class="mr-3">
                        <i class="fa fa-star fa-3x text-info"></i>
                    </div>

                    <div>
                        <h6 class="mb-1">
                            Lowongan Premium
                        </h6>

                        <h2 class="mb-0">
                            {{ $premiumJobs }}
                        </h2>
                    </div>

                </div>
            </div>
        </div>


        </div>

        <div class="row">


            {{-- LOWONGAN TERBARU --}}
            <div class="col-lg-8">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            <i class="fa fa-list"></i>
                            Lowongan Terbaru
                        </h4>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Perusahaan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($latestJobs as $job)

                                    <tr>

                                        <td>
                                            {{ $job->title }}
                                        </td>

                                        <td>
                                            {{ $job->company }}
                                        </td>

                                        <td>

                                            @if($job->status == 0)

                                                <span class="badge badge-warning">
                                                    Pending
                                                </span>

                                            @elseif($job->status == 1)

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
                                            {{ $job->created_at->format('d-m-Y') }}
                                        </td>

                                    </tr>

                                    @empty

                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Belum ada data.
                                        </td>
                                    </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

            {{-- PANEL KANAN --}}
            <div class="col-lg-4">

                <div class="card">

                    <div class="card-header">

                        <h4 class="card-title mb-0">

                            @if(auth()->user()->role == 'admin')

                                <i class="fa fa-bar-chart"></i>
                                Ringkasan Sistem

                            @else

                                <i class="fa fa-user"></i>
                                Informasi Akun

                            @endif

                        </h4>

                    </div>

                    <div class="card-body">

                        @if(auth()->user()->role == 'admin')

                            <p>
                                <i class="fa fa-users"></i>
                                Total User :
                                <strong>{{ $totalUsers }}</strong>
                            </p>

                            <p>
                                <i class="fa fa-building"></i>
                                Total Employer :
                                <strong>{{ $totalEmployers }}</strong>
                            </p>

                            <p>
                                <i class="fa fa-folder-open"></i>
                                Total Kategori :
                                <strong>{{ $totalCategories }}</strong>
                            </p>

                        @else

                            <p>
                                <i class="fa fa-user"></i>
                                {{ auth()->user()->name }}
                            </p>

                            <p>
                                <i class="fa fa-envelope"></i>
                                {{ auth()->user()->email }}
                            </p>

                            <p>
                                <i class="fa fa-shield"></i>
                                {{ ucfirst(auth()->user()->role) }}
                            </p>

                            <p>
                                <i class="fa fa-calendar"></i>
                                Bergabung:
                                {{ auth()->user()->created_at->format('d M Y') }}
                            </p>

                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
