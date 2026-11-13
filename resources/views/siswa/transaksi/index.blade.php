@extends('layouts.siswa')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <h2 class="fw-bold">Riwayat Aspirasi Saya</h2>
            <a href="{{ route('siswa.transaksi.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i>Buat Baru</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
