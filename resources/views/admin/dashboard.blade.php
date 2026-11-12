@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold">Dashboard <span class="text-capitalize text-warning">{{ Auth::user()->role }}</span></h2>
            <p class="text-secondary">Selamat datang di panel admin Pengaduan Sarana Sekolah.</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Aspirasi</h5>
                    <h2 class="mb-0">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-warning text-dark shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Proses</h5>
                    <h2 class="mb-0">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-success text-white shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Selesai</h5>
                    <h2 class="mb-0">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-danger text-white shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Ditolak</h5>
                    <h2 class="mb-0">0</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection