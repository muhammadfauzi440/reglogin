@extends('layouts.siswa')

@section('content')
    <div class="container-fluid px-2 px-md-4 py-3">
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Buat Laporan Baru</h3>
            <p class="text-secondary mb-0">
                Silakan isi formulir berikut untuk menyampaikan aspirasi atau laporan kerusakan sarana.
            </p>
        </div>

        <div class="card border-0 shadow-sm w-100">

            <div class="card-header bg-primary text-white py-3 px-4">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-file-earmark-plus me-2"></i>
                    Formulir Aspirasi
                </h5>
            </div>

            <div class="card-body p-3 p-md-4">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('siswa.transaksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">

                        <div class="col-12">
                            <label for="transaction" class="form-label fw-bold">
                                Judul Laporan <span class="text-danger">*</span>
                            </label>

                            <input type="text" class="form-control" id="transaction" name="transaction"
                                value="{{ old('transaction') }}" placeholder="Contoh: AC Mati di Kelas" required>
                        </div>

                        <div class="col-12">
                            <label for="category" class="form-label fw-bold">
                                Kategori Sarana <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" id="category" name="category" required>
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="Fasilitas Kelas"
                                    {{ old('category') == 'Fasilitas Kelas' ? 'selected' : '' }}>Fasilitas Kelas</option>
                                <option value="Fasilitas Umum" {{ old('category') == 'Fasilitas Umum' ? 'selected' : '' }}>
                                    Fasilitas Umum</option>
                                <option value="Laboratorium / IT"
                                    {{ old('category') == 'Laboratorium / IT' ? 'selected' : '' }}>Laboratorium / IT
                                </option>
                                <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="desc" class="form-label fw-bold">
                                Deskripsi Laporan <span class="text-danger">*</span>
                            </label>

                            <textarea class="form-control" id="desc" name="desc" rows="6"
                                placeholder="Jelaskan kondisi sarana yang ingin dilaporkan (sebutkan juga detail lokasinya)..." required>{{ old('desc') }}</textarea>
                        </div>

                        <div class="col-12">
                            <label for="photo" class="form-label fw-bold">
                                Foto Pendukung <span class="text-danger">*</span>
                            </label>

                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*"
                                required>

                            <small class="text-secondary">
                                Unggah foto sebagai bukti pendukung laporan (Wajib, maksimal 2MB).
                            </small>
                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('siswa.transaksi.index') }}" class="btn btn-light border px-4">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send me-1"></i>
                            Kirim Laporan
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
