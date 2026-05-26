@extends('layouts.admin')

@section('title', 'Ubah Halaman Profil - LPPM')
@section('header_title', 'Kelola Halaman Profil')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.profil.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Edit Halaman: {{ $profil->title }}</h5>
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

    <form action="{{ route('admin.profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Halaman <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $profil->title) }}" required readonly>
            <span class="text-white-50" style="font-size: 0.75rem;">Judul halaman sistem tidak dapat diubah untuk menjaga integritas menu navigasi depan.</span>
        </div>

        <div class="mb-3">
            <label for="image_file" class="form-label">Gambar Latar / Banner Halaman (Opsional)</label>
            @if($profil->image)
                <div class="mb-3">
                    <img src="{{ asset($profil->image) }}" alt="{{ $profil->title }}" class="rounded img-thumbnail" style="max-height: 150px;">
                    <p class="text-white-50 small mt-1">Banner saat ini</p>
                </div>
            @endif
            <input type="file" name="image_file" id="image_file" class="form-control" accept="image/*">
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Pilih file baru jika ingin mengubah banner halaman ini. Ukuran maksimal 1 MB (Format: jpeg, png, jpg, webp).</span>
        </div>

        <div class="mb-4">
            <label for="content" class="form-label">Isi Konten Halaman <span class="text-danger">*</span></label>
            <textarea name="content" id="content" class="form-control" rows="12" placeholder="Tulis konten halaman secara detail..." required>{{ old('content', $profil->content) }}</textarea>
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Anda dapat menuliskan kode HTML untuk menyusun teks (misal: p, ul, li, strong, dll.) agar format tampilan front-end tetap rapi.</span>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Perubahan</button>
    </form>
</div>
@endsection
