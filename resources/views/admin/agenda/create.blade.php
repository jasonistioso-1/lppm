@extends('layouts.admin')

@section('title', 'Tambah Agenda Kegiatan - LPPM')
@section('header_title', 'Kelola Agenda Kegiatan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.agenda.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Agenda Kegiatan Baru</h5>
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

    <form action="{{ route('admin.agenda.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Agenda / Nama Kegiatan <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Sosialisasi Hibah Internal Penelitian Tahun Akademik..." value="{{ old('title') }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="location" class="form-label">Lokasi / Ruangan <span class="text-danger">*</span></label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Ruang Seminar Lt. 2 atau Zoom Meeting" value="{{ old('location') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="event_date" class="form-label">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
                <input type="date" name="event_date" id="event_date" class="form-control" value="{{ old('event_date', date('Y-m-d')) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="start_time" class="form-label">Waktu Mulai <span class="text-danger">*</span></label>
                <input type="text" name="start_time" id="start_time" class="form-control" placeholder="09:00 WIB" value="{{ old('start_time') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="end_time" class="form-label">Waktu Selesai <span class="text-danger">*</span></label>
                <input type="text" name="end_time" id="end_time" class="form-control" placeholder="12:00 WIB" value="{{ old('end_time') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select" required>
                    <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Diterbitkan</option>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draf</option>
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Deskripsi / Detail Agenda (Opsional)</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Tuliskan keterangan detail mengenai agenda ini...">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Agenda</button>
    </form>
</div>
@endsection
