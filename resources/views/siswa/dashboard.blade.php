@extends('layouts.siswa')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold">Dashboard Siswa</h2>
            <p class="text-secondary">Selamat datang di portal layanan pengaduan sarana sekolah.</p>
        </div>
    </div>

    <div class="card shadow-sm border-0 bg-primary text-white">
        <div class="card-body p-4">
            <h4>Punya keluhan atau masukan untuk sarana sekolah?</h4>
            <p>Sampaikan aspirasimu sekarang juga agar fasilitas sekolah kita menjadi lebih baik.</p>
            <a href="{{ route('siswa.transaksi.create') }}" class="btn btn-light text-primary fw-bold mt-2">Buat Aspirasi Sekarang</a>
        </div>
    </div>
</div>
@endsection