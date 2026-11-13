@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h3 class="fw-bold mb-0">Tindak Lanjut Laporan</h3>
        <a href="{{ route('admin.transaksi.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-7 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-semibold">Informasi Laporan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr><th width="30%">Pelapor</th><td>: {{ $transaksi->user->name ?? 'Anonim' }}</td></tr>
                        <tr><th>Kategori</th><td>: {{ $transaksi->category }}</td></tr>
                        <tr><th>Judul Laporan</th><td>: {{ $transaksi->transaction }}</td></tr>
                        <tr><th>Deskripsi</th><td>: {{ $transaksi->desc }}</td></tr>
                        <tr>
                            <th>Foto Bukti</th>
                            <td>: 
                                @if($transaksi->photo)
                                    <img src="{{ asset('storage/' . $transaksi->photo) }}" class="img-fluid rounded mt-2" style="max-height: 200px;">
                                @else
                                    <em class="text-muted">Tidak ada foto</em>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-5 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-semibold">Berikan Tanggapan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status Laporan</label>
                            <select class="form-select" name="status" required>
                                <option value="waiting" {{ $transaksi->status == 'waiting' ? 'selected' : '' }}>Menunggu</option>
                                <option value="in_progress" {{ $transaksi->status == 'in_progress' ? 'selected' : '' }}>Diproses (Sedang Dikerjakan)</option>
                                <option value="done" {{ $transaksi->status == 'done' ? 'selected' : '' }}>Selesai (Sudah Diperbaiki)</option>
                                <option value="rejected" {{ $transaksi->status == 'rejected' ? 'selected' : '' }}>Ditolak / Tidak Valid</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Tanggapan Admin</label>
                            <textarea class="form-control" name="response" rows="5" placeholder="Berikan penjelasan atau tanggapan terkait laporan ini...">{{ old('response', $transaksi->response) }}</textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan Pembaruan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection