@extends('layouts.siswa')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0">Riwayat Aspirasi Saya</h2>
        <a href="{{ route('siswa.transaksi.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Buat Baru</a>
    </div>
    
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <p class="text-muted">Tabel riwayat aspirasi yang pernah kamu buat akan muncul di sini.</p>
        </div>
    </div>
</div>
@endsection