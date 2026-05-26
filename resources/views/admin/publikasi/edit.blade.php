@extends('layouts.admin')

@section('title', 'Ubah Publikasi Ilmiah - LPPM')
@section('header_title', 'Kelola Publikasi Ilmiah')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.publikasi.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Ubah Data Publikasi Ilmiah</h5>
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

    <form action="{{ route('admin.publikasi.update', $publikasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Publikasi / Artikel <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Pengaruh Digital Marketing Terhadap Volume Penjualan UMKM..." value="{{ old('title', $publikasi->title) }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="type" class="form-label">Jenis Publikasi <span class="text-danger">*</span></label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">-- Pilih Jenis Publikasi --</option>
                    @foreach($types as $type)
                        <option value="{{ $type }}" {{ old('type', $publikasi->type) === $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="author" class="form-label">Nama Penulis / Dosen <span class="text-danger">*</span></label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Dr. John Doe, M.M." value="{{ old('author', $publikasi->author) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="journal_name" class="form-label">Nama Jurnal / Seminar Penerbit <span class="text-danger">*</span></label>
                <input type="text" name="journal_name" id="journal_name" class="form-control" placeholder="Jurnal Akuntansi dan Keuangan Indonesia" value="{{ old('journal_name', $publikasi->journal_name) }}" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="year" class="form-label">Tahun Terbit <span class="text-danger">*</span></label>
                <input type="number" name="year" id="year" class="form-control" placeholder="2026" value="{{ old('year', $publikasi->year) }}" required>
            </div>

            <div class="col-md-3 mb-3">
                <label for="status" class="form-label">Status Penerbitan <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select" required>
                    <option value="published" {{ old('status', $publikasi->status) === 'published' ? 'selected' : '' }}>Diterbitkan</option>
                    <option value="draft" {{ old('status', $publikasi->status) === 'draft' ? 'selected' : '' }}>Draf</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label for="link" class="form-label">Tautan Luar / URL Jurnal (Opsional)</label>
            <input type="url" name="link" id="link" class="form-control" placeholder="https://doi.org/10.12345/jaki.v1i2..." value="{{ old('link', $publikasi->link) }}">
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Tautan menuju artikel asli di situs penerbit jurnal.</span>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Perubahan</button>
    </form>
</div>
@endsection
