@extends('layouts.admin')

@section('title', 'Tambah Dokumen - LPPM')
@section('header_title', 'Kelola Dokumen')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.dokumen.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Dokumen Baru</h5>
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

    <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Dokumen <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Buku Panduan Penelitian Internal Edisi 2026..." value="{{ old('title') }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Kategori / Kelompok Dokumen <span class="text-danger">*</span></label>
                <select name="category" id="category" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ old('category') === $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status Penerbitan <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select" required>
                    <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Diterbitkan</option>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draf</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="doc_file" class="form-label">Pilih Berkas Dokumen <span class="text-danger">*</span></label>
            <input type="file" name="doc_file" id="doc_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar" required>
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Format berkas yang didukung: pdf, doc, docx, xls, xlsx, zip, rar. Ukuran maksimal 5 MB.</span>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Deskripsi / Penjelasan Singkat (Opsional)</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Tuliskan penjelasan singkat mengenai isi dokumen ini...">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Dokumen</button>
    </form>
</div>
@endsection
