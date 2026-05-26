@extends('layouts.admin')

@section('title', 'Tambah Laporan Abdimas - LPPM')
@section('header_title', 'Kelola Laporan Abdimas')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.abdimas.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Laporan Pengabdian Masyarakat Baru</h5>
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

    <form action="{{ route('admin.abdimas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Kegiatan Abdimas <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Penyuluhan Manajemen Keuangan Keluarga bagi Warga RW 05 Kelapa Gading..." value="{{ old('title') }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="scheme" class="form-label">Skema Abdimas <span class="text-danger">*</span></label>
                <select name="scheme" id="scheme" class="form-select" required>
                    <option value="">-- Pilih Skema Abdimas --</option>
                    <option value="Abdimas Mandiri Dosen" {{ old('scheme') === 'Abdimas Mandiri Dosen' ? 'selected' : '' }}>Abdimas Mandiri Dosen</option>
                    <option value="Abdimas Hibah Internal KKG" {{ old('scheme') === 'Abdimas Hibah Internal KKG' ? 'selected' : '' }}>Abdimas Hibah Internal KKG</option>
                    <option value="Kemitraan Masyarakat" {{ old('scheme') === 'Kemitraan Masyarakat' ? 'selected' : '' }}>Kemitraan Masyarakat</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="lecturer_name" class="form-label">Nama Ketua Pelaksana / Dosen <span class="text-danger">*</span></label>
                <input type="text" name="lecturer_name" id="lecturer_name" class="form-control" placeholder="Dr. John Doe, M.M." value="{{ old('lecturer_name') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="year" class="form-label">Tahun Pelaksanaan <span class="text-danger">*</span></label>
                <input type="number" name="year" id="year" class="form-control" placeholder="2026" value="{{ old('year', date('Y')) }}" required>
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
            <label for="pdf_file" class="form-label">Berkas Laporan Akhir (PDF - Opsional)</label>
            <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf">
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Berkas laporan lengkap hasil kegiatan pengabdian. Format harus PDF, maksimal 5 MB.</span>
        </div>

        <div class="mb-4">
            <label for="abstract" class="form-label">Abstrak / Rangkuman Kegiatan (Opsional)</label>
            <textarea name="abstract" id="abstract" class="form-control" rows="6" placeholder="Tuliskan ringkasan singkat pelaksanaan kegiatan...">{{ old('abstract') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Laporan Abdimas</button>
    </form>
</div>
@endsection
