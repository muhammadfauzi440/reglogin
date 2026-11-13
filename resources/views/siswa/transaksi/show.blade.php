@extends('layouts.siswa')

@section('content')
<div class="container-fluid px-2 px-md-4 py-3">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h3 class="fw-bold mb-1">Detail Laporan</h3>
        <a href="{{ route('siswa.transaksi.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>

    <div class="card border-0 shadow-sm w-100">
        <div class="card-header bg-info text-white py-3 px-4">
            <h5 class="mb-0 fw-semibold">Informasi Aspirasi</h5>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-7">
                    <table class="table table-borderless">
                        <tr>
                            <th width="30%">Judul Laporan</th>
                            <td>: {{ $transaksi->transaction }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>: {{ $transaksi->category }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lapor</th>
                            <td>: {{ $transaksi->created_at->format('d F Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>: 
                                @if($transaksi->status == 'waiting') <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif($transaksi->status == 'in_progress') <span class="badge bg-primary">Diproses</span>
                                @elseif($transaksi->status == 'done') <span class="badge bg-success">Selesai</span>
                                @else <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>: {{ $transaksi->desc }}</td>
                        </tr>
                        <tr>
                            <th>Tanggapan Admin</th>
                            <td>: 
                                @if($transaksi->response == '')
                                    <em class="text-muted">Belum ada tanggapan.</em>
                                @else
                                    <span class="text-success fw-bold">{{ $transaksi->response }}</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5 text-center">
                    <p class="fw-bold mb-2">Foto Bukti:</p>
                    <img src="{{ asset('storage/' . $transaksi->photo) }}" alt="Bukti Laporan" class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection