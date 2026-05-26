@extends('layouts.admin')

@section('title', 'Tambah Video YouTube - LPPM')
@section('header_title', 'Kelola Video YouTube')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.video.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Video YouTube Baru</h5>
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

    <form action="{{ route('admin.video.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Video <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Profil Lembaga Penelitian dan Pengabdian Masyarakat IBI KKG" value="{{ old('title') }}" required>
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="url" class="form-label">Tautan / URL Video YouTube <span class="text-danger">*</span></label>
                <input type="url" name="url" id="url" class="form-control" placeholder="https://www.youtube.com/watch?v=..." value="{{ old('url') }}" required>
                <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Mendukung format URL biasa maupun URL share (misal: https://youtu.be/...). Rute akan diembed otomatis.</span>
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
            <label for="description" class="form-label">Deskripsi Video (Opsional)</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Tuliskan deskripsi atau rangkuman singkat video ini...">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Video</button>
    </form>
</div>
@endsection
