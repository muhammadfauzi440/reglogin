@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Kelola Laporan Siswa</h3>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm w-100">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="py-3 px-4" width="5%">No</th>
                            <th class="py-3">Tanggal</th>
                            <th class="py-3">Pelapor</th>
                            <th class="py-3">Laporan</th>
                            <th class="py-3">Deskripsi</th>
                            <th class="py-3">Bukti Foto</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 px-4 text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $transaksi)
                            <tr>
                                <td class="px-4 fw-medium">{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->created_at->format('d M Y') }}</td>
                                <td><span class="fw-semibold">{{ $transaksi->user->name ?? 'Anonim' }}</span></td>
                                <td>{{ $transaksi->transaction }}</td>
                                <td>{{ $transaksi->desc }}</td>
                                <td>
                                    @if ($transaksi->photo)
                                        <img src="{{ asset('storage/' . $transaksi->photo) }}" alt="Bukti Foto" width="100" class="img-thumbnail">    
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    @if($transaksi->status == 'waiting') <span class="badge bg-warning text-dark">Menunggu</span>
                                    @elseif($transaksi->status == 'in_progress') <span class="badge bg-primary">Diproses</span>
                                    @elseif($transaksi->status == 'done') <span class="badge bg-success">Selesai</span>
                                    @else <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td class="px-4 text-center text-nowrap">
                                    <a href="{{ route('admin.transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-outline-info" title="Detail"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-outline-primary" title="Tindak Lanjut"><i class="bi bi-pencil-square"></i></a>
                                    
                                    <form action="{{ route('admin.transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus laporan ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">Belum ada laporan dari siswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection