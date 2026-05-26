@extends('layouts.admin')

@section('title', 'Ubah Slider Banner - LPPM')
@section('header_title', 'Kelola Slider Banner')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.slider.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Ubah Slider Banner</h5>
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

    <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="title" class="form-label">Judul Banner <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Selamat Datang di LPPM IBI Kwik Kian Gie" value="{{ old('title', $slider->title) }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="sort_order" class="form-label">Urutan Tampil <span class="text-danger">*</span></label>
                <input type="number" name="sort_order" id="sort_order" class="form-control" placeholder="1" value="{{ old('sort_order', $slider->sort_order) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subjudul / Deskripsi Banner (Opsional)</label>
            <textarea name="subtitle" id="subtitle" class="form-control" rows="3" placeholder="Mengakselerasi Hilirisasi Riset dan Pengabdian kepada Masyarakat Berbasis Nilai Kemanusiaan...">{{ old('subtitle', $slider->subtitle) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="button_text" class="form-label">Teks Tombol Aksi (Opsional)</label>
                <input type="text" name="button_text" id="button_text" class="form-control" placeholder="Selengkapnya" value="{{ old('button_text', $slider->button_text) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="button_url" class="form-label">Tautan / URL Tombol Aksi (Opsional)</label>
                <input type="text" name="button_url" id="button_url" class="form-control" placeholder="profil/tentang-kami" value="{{ old('button_url', $slider->button_url) }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="image_file" class="form-label">Gambar Banner (Opsional)</label>
                @if($slider->image)
                    <div class="mb-3">
                        <img src="{{ asset($slider->image) }}" alt="Slider Banner" class="rounded img-thumbnail" style="max-height: 120px;">
                        <p class="text-white-50 small mt-1">Banner saat ini</p>
                    </div>
                @endif
                <input type="file" name="image_file" id="image_file" class="form-control" accept="image/*">
                <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Pilih file baru jika ingin mengubah banner. Maksimal 1 MB (Format: jpeg, png, jpg, webp).</span>
            </div>

            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select" required>
                    <option value="active" {{ old('status', $slider->status) === 'active' ? 'selected' : '' }}>Aktif (Tampilkan)</option>
                    <option value="inactive" {{ old('status', $slider->status) === 'inactive' ? 'selected' : '' }}>Nonaktif (Sembunyikan)</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Perubahan</button>
    </form>
</div>
@endsection
