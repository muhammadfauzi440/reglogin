@extends('layouts.siswa')

@section('content')
    <div class="container-fluid px-2 px-md-4 py-3">
        
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1">Riwayat Aspirasi Saya</h3>
                <p class="text-secondary mb-0">Daftar laporan kerusakan sarana yang telah Anda kirimkan.</p>
            </div>
            <a href="{{ route('siswa.transaksi.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Buat Laporan Baru
            </a>
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
                                <th scope="col" class="py-3 px-4 text-nowrap" width="5%">No</th>
                                <th scope="col" class="py-3 text-nowrap">Tanggal</th>
                                <th scope="col" class="py-3 text-nowrap">Judul Laporan</th>
                                <th scope="col" class="py-3 text-nowrap">Kategori</th>
                                <th scope="col" class="py-3 text-nowrap">Deskripsi</th>
                                <th scope="col" class="py-3 text-nowrap">Bukti Foto</th>
                                <th scope="col" class="py-3 text-nowrap">Status</th>
                                <th scope="col" class="py-3 px-4 text-center text-nowrap" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksis as $transaksi)
                                <tr>
                                    <td class="px-4 fw-medium">{{ $loop->iteration }}</td>
                                    <td class="text-nowrap">{{ $transaksi->created_at->format('d M Y') }}</td>
                                    <td class="fw-semibold">{{ $transaksi->transaction }}</td>
                                    <td>{{ $transaksi->category }}</td>
                                    <td>{{ $transaksi->desc }}</td>
                                    <td>
                                        @if ($transaksi->photo)
                                            <img src="{{ asset('storage/' . $transaksi->photo) }}" alt="Foto Laporan" width="100" class="img-thumbnail">
                                        @else
                                            <span class="text-muted">Tidak ada photo</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($transaksi->status == 'waiting')
                                            <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Menunggu</span>
                                        @elseif($transaksi->status == 'in_progress')
                                            <span class="badge bg-primary"><i class="bi bi-tools me-1"></i>Diproses</span>
                                        @elseif($transaksi->status == 'done')
                                            <span class="badge bg-success"><i class="bi bi-check2-all me-1"></i>Selesai</span>
                                        @elseif($transaksi->status == 'rejected')
                                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Ditolak</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $transaksi->status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-4 text-center text-nowrap">
                                        <a href="{{ route('siswa.transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        @if($transaksi->status == 'waiting')
                                            <a href="{{ route('siswa.transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Laporan">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('siswa.transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah yakin ingin menghapus laporan ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Laporan">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                        Anda belum memiliki riwayat laporan.<br>
                                        Silakan klik tombol <b>"Buat Laporan Baru"</b> untuk mengirim aspirasi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            @if($transaksis->count() > 10)
            <div class="card-footer bg-white py-3">
                <div class="d-flex justify-content-center">
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection