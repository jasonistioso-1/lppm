@extends('layouts.admin')

@section('title', 'Tambah Akademisi - LPPM')
@section('header_title', 'Kelola Akademisi')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.dosen.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Akademisi / Dosen Baru</h5>
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

    <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Lengkap beserta Gelar <span class="text-danger">*</span></label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Dr. Said Kelana Asnawi, S.E., M.M." value="{{ old('nama') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="nidn" class="form-label">NIDN / Kode Dosen <span class="text-danger">*</span></label>
                <input type="text" name="nidn" id="nidn" class="form-control" placeholder="0312046901" value="{{ old('nidn') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="prodi" class="form-label">Program Studi <span class="text-danger">*</span></label>
                <select name="prodi" id="prodi" class="form-select" required>
                    <option value="">-- Pilih Program Studi --</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi }}" {{ old('prodi') === $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Alamat Email (Opsional)</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="dosen@kwikkiangie.ac.id" value="{{ old('email') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="keahlian" class="form-label">Bidang Keahlian Riset (Opsional)</label>
                <input type="text" name="keahlian" id="keahlian" class="form-control" placeholder="Manajemen Keuangan &amp; Pasar Modal" value="{{ old('keahlian') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select" required>
                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="google_scholar" class="form-label">Google Scholar ID (Opsional)</label>
                <input type="text" name="google_scholar" id="google_scholar" class="form-control" placeholder="P_Rdw4AAAAAJ" value="{{ old('google_scholar') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="sinta" class="form-label">SINTA ID (Opsional)</label>
                <input type="text" name="sinta" id="sinta" class="form-control" placeholder="6001234" value="{{ old('sinta') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="scopus" class="form-label">Scopus ID (Opsional)</label>
                <input type="text" name="scopus" id="scopus" class="form-control" placeholder="57218392182" value="{{ old('scopus') }}">
            </div>
        </div>

        <div class="mb-4">
            <label for="photo" class="form-label">Pas Foto Dosen (Opsional)</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Ukuran foto maksimal adalah 1 MB (Format: jpeg, png, jpg, webp).</span>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Data Dosen</button>
    </form>
</div>
@endsection
