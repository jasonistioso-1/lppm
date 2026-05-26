@extends('layouts.admin')

@section('title', 'Tambah Berita - LPPM')
@section('header_title', 'Kelola Berita')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.berita.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Berita Slider / Pengumuman Baru</h5>
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

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Workshop Penyusunan Proposal Hibah Penelitian..." value="{{ old('title') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="date" class="form-label">Tanggal Terbit / Acara <span class="text-danger">*</span></label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Kategori Berita <span class="text-danger">*</span></label>
                <select name="category" id="category" class="form-select" required>
                    <option value="Umum" {{ old('category') === 'Umum' ? 'selected' : '' }}>Umum / Pengumuman</option>
                    <option value="Penelitian" {{ old('category') === 'Penelitian' ? 'selected' : '' }}>Penelitian</option>
                    <option value="Abdimas" {{ old('category') === 'Abdimas' ? 'selected' : '' }}>Pengabdian Masyarakat (Abdimas)</option>
                    <option value="Seminar" {{ old('category') === 'Seminar' ? 'selected' : '' }}>Seminar / Workshop</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status Penerbitan <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select" required>
                    <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Diterbitkan</option>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draf (Sembunyikan)</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="image_file" class="form-label">Poster / Gambar Berita (Opsional)</label>
            <input type="file" name="image_file" id="image_file" class="form-control" accept="image/*">
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Ukuran foto maksimal adalah 1 MB (Format: jpeg, png, jpg, webp).</span>
        </div>

        <div class="mb-4">
            <label for="content" class="form-label">Isi Lengkap Detail Berita <span class="text-danger">*</span></label>
            <textarea name="content" id="content" class="form-control" rows="10" placeholder="Tulis rincian berita secara detail..." required>{{ old('content') }}</textarea>
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Anda dapat menuliskan kode HTML untuk menyusun paragraf, link, bullet point, dll.</span>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Berita</button>
    </form>
</div>
@endsection
