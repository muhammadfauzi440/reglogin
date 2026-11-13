@extends('layouts.siswa')

@section('content')
<div class="container-fluid px-2 px-md-4 py-3">
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Laporan</h3>
    </div>

    <div class="card border-0 shadow-sm w-100">
        <div class="card-header bg-warning text-dark py-3 px-4">
            <h5 class="mb-0 fw-semibold"><i class="bi bi-pencil-square me-2"></i> Perbarui Formulir</h5>
        </div>

        <div class="card-body p-3 p-md-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-12">
                        <label for="transaction" class="form-label fw-bold">Judul Laporan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="transaction" name="transaction" value="{{ old('transaction', $transaksi->transaction) }}" required>
                    </div>

                    <div class="col-12">
                        <label for="category" class="form-label fw-bold">Kategori Sarana <span class="text-danger">*</span></label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="Fasilitas Kelas" {{ (old('category', $transaksi->category) == 'Fasilitas Kelas') ? 'selected' : '' }}>Fasilitas Kelas</option>
                            <option value="Fasilitas Umum" {{ (old('category', $transaksi->category) == 'Fasilitas Umum') ? 'selected' : '' }}>Fasilitas Umum</option>
                            <option value="Laboratorium / IT" {{ (old('category', $transaksi->category) == 'Laboratorium / IT') ? 'selected' : '' }}>Laboratorium / IT</option>
                            <option value="Lainnya" {{ (old('category', $transaksi->category) == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="desc" class="form-label fw-bold">Deskripsi Laporan <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="desc" name="desc" rows="6" required>{{ old('desc', $transaksi->desc) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="photo" class="form-label fw-bold">Foto Pendukung (Opsional)</label>
                        <div class="mb-2">
                            <small class="d-block mb-1 text-muted">Foto saat ini:</small>
                            <img src="{{ asset('storage/' . $transaksi->photo) }}" alt="Foto Lama" class="img-thumbnail" width="150">
                        </div>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        <small class="text-secondary">Biarkan kosong jika tidak ingin mengubah foto. (Maksimal 2MB).</small>
                    </div>
                </div>

                <hr class="my-4">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('siswa.transaksi.index') }}" class="btn btn-light border px-4">Batal</a>
                    <button type="submit" class="btn btn-warning px-4"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection