@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri - LPPM')
@section('header_title', 'Kelola Galeri Foto')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.galeri.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Foto Galeri Baru</h5>
</div>

<div class="glass-card">
    @if ($errors->any())
        <div class="alert alert-danger border-0 bg-danger bg-opacity-25 text-white small rounded-3 mb-4">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Dokumentasi Foto <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Pelepasan Mahasiswa KKN Mandiri IBI KKG" value="{{ old('title') }}" required>
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="image_file" class="form-label">Unggah Gambar Dokumentasi <span class="text-danger">*</span></label>
                <input type="file" name="image_file" id="image_file" class="form-control" accept="image/*" required>
                <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Ukuran foto maksimal adalah 1 MB (Format: jpeg, png, jpg, webp).</span>
            </div>

            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select" required>
                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Aktif (Tampilkan)</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Nonaktif (Sembunyikan)</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Keterangan / Rincian Kegiatan (Opsional)</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Tulis rincian singkat acara atau keterangan tempat/tanggal dokumentasi foto ini...">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Foto Galeri</button>
    </form>
</div>
@endsection
