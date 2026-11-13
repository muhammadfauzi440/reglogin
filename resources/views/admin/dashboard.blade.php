@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold">Dashboard <span class="text-capitalize text-warning">{{ Auth::user()->role }}</span></h2>
                <p class="text-secondary">Selamat datang di panel admin Pengaduan Sarana Sekolah.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card bg-primary text-white shadow-sm border-0 h-100 w">
                    <div class="card-body">
                        <h5 class="card-title text-nowrap">Aspirasi</h5>
                        <h2 class="mb-0">{{ $transaksiWait }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card bg-warning text-dark shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-nowrap">Proses</h5>
                        <h2 class="mb-0">{{ $transaksiProgress }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card bg-success text-white shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-nowrap">Selesai</h5>
                        <h2 class="mb-0">{{ $transaksiDone }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card bg-danger text-white shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-nowrap">Ditolak</h5>
                        <h2 class="mb-0">{{ $transaksiReject }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
