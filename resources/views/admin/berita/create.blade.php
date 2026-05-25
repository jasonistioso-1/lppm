@extends('layouts.admin')

@section('title', 'Tambah Berita - LPPM')
@section('header_title', 'Kelola Berita')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.berita.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Berita Slider Baru</h5>
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
                <input type="text" name="title" id="title" class="form-control" placeholder="Workshop Penyusunan Proposal Hibah..." value="{{ old('title') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="date" class="form-label">Tanggal / Batas Pengajuan <span class="text-danger">*</span></label>
                <input type="text" name="date" id="date" class="form-control" placeholder="20 Mei 2026 atau Batas akhir: 4 Mei 2026" value="{{ old('date') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="image_file" class="form-label">Poster Berita (Opsional)</label>
                <input type="file" name="image_file" id="image_file" class="form-control">
                <span class="text-white-50" style="font-size: 0.75rem;">Mendukung format PNG, JPG, JPEG. Maksimal 4 MB.</span>
            </div>

            <div class="col-md-6 mb-3">
                <label for="link" class="form-label">Tautan Redirect Halaman (Opsional)</label>
                <input type="text" name="link" id="link" class="form-control" placeholder="penelitian/pengumuman atau http://..." value="{{ old('link') }}">
                <span class="text-white-50" style="font-size: 0.75rem;">Dipakai jika berita diklik langsung mengarah ke halaman sub-menu. Kosongkan jika memakai modal pop-up.</span>
            </div>
        </div>

        <div class="mb-4">
            <label for="content" class="form-label">Isi Detail Berita (Modal Pop-up - Opsional)</label>
            <textarea name="content" id="content" class="form-control" rows="8" placeholder="Tulis rincian berita dalam format HTML atau teks biasa. Contoh:
<p>Halo Sivitas Akademika,</p>
<p>Kami mengundang Anda...</p>">{{ old('content') }}</textarea>
            <span class="text-white-50" style="font-size: 0.75rem;">Tulis isi lengkap yang akan muncul di modal ketika poster diklik pada slider beranda. Anda dapat menuliskan kode HTML untuk paragraf, daftar list, link, dan lainnya.</span>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Berita</button>
    </form>
</div>
@endsection
