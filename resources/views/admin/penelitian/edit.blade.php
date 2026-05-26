@extends('layouts.admin')

@section('title', 'Ubah Laporan Penelitian - LPPM')
@section('header_title', 'Kelola Laporan Penelitian')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.penelitian.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Ubah Laporan Penelitian</h5>
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

    <form action="{{ route('admin.penelitian.update', $penelitian->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Judul Penelitian <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Analisis Pengaruh Good Corporate Governance Terhadap Nilai Perusahaan..." value="{{ old('title', $penelitian->title) }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="scheme" class="form-label">Skema Penelitian <span class="text-danger">*</span></label>
                <select name="scheme" id="scheme" class="form-select" required>
                    <option value="">-- Pilih Skema Penelitian --</option>
                    <option value="Penelitian Dosen Pemula (PDP)" {{ old('scheme', $penelitian->scheme) === 'Penelitian Dosen Pemula (PDP)' ? 'selected' : '' }}>Penelitian Dosen Pemula (PDP)</option>
                    <option value="Penelitian Fundamental" {{ old('scheme', $penelitian->scheme) === 'Penelitian Fundamental' ? 'selected' : '' }}>Penelitian Fundamental</option>
                    <option value="Hibah Internal Kwik Kian Gie" {{ old('scheme', $penelitian->scheme) === 'Hibah Internal Kwik Kian Gie' ? 'selected' : '' }}>Hibah Internal Kwik Kian Gie</option>
                    <option value="Penelitian Terapan" {{ old('scheme', $penelitian->scheme) === 'Penelitian Terapan' ? 'selected' : '' }}>Penelitian Terapan</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="lecturer_name" class="form-label">Nama Ketua Peneliti / Dosen <span class="text-danger">*</span></label>
                <input type="text" name="lecturer_name" id="lecturer_name" class="form-control" placeholder="Dr. John Doe, M.M." value="{{ old('lecturer_name', $penelitian->lecturer_name) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="year" class="form-label">Tahun Pelaksanaan <span class="text-danger">*</span></label>
                <input type="number" name="year" id="year" class="form-control" placeholder="2026" value="{{ old('year', $penelitian->year) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status Penerbitan <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select" required>
                    <option value="published" {{ old('status', $penelitian->status) === 'published' ? 'selected' : '' }}>Diterbitkan</option>
                    <option value="draft" {{ old('status', $penelitian->status) === 'draft' ? 'selected' : '' }}>Draf</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="pdf_file" class="form-label">Berkas Laporan Akhir (PDF - Opsional)</label>
            @if($penelitian->document)
                <div class="mb-3">
                    <a href="{{ asset($penelitian->document) }}" target="_blank" class="btn btn-outline-danger btn-sm rounded-3">
                        <i class="fa-solid fa-file-pdf me-1"></i> Buka PDF Saat Ini
                    </a>
                </div>
            @endif
            <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept="application/pdf">
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Pilih file baru jika ingin memperbarui laporan. Format harus PDF, maksimal 5 MB.</span>
        </div>

        <div class="mb-4">
            <label for="abstract" class="form-label">Abstrak Penelitian (Opsional)</label>
            <textarea name="abstract" id="abstract" class="form-control" rows="6" placeholder="Tuliskan abstrak atau ringkasan metodologi riset...">{{ old('abstract', $penelitian->abstract) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Perubahan</button>
    </form>
</div>
@endsection
