@extends('layouts.admin')

@section('title', 'Tambah Akademisi - LPPM')
@section('header_title', 'Kelola Akademisi')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.dosen.index') }}" class="text-white-50 text-decoration-none small">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
    <h5 class="fw-bold mt-2">Tambah Akademisi Baru</h5>
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

    <form action="{{ route('admin.dosen.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Lengkap beserta Gelar <span class="text-danger">*</span></label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Dr. John Doe, M.M." value="{{ old('nama') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="prodi" class="form-label">Program Studi <span class="text-danger">*</span></label>
                <select name="prodi" id="prodi" class="form-select" required>
                    <option value="">-- Pilih Program Studi --</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi }}" {{ old('prodi') === $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="gsName" class="form-label">Nama Google Scholar (Opsional)</label>
                <input type="text" name="gsName" id="gsName" class="form-control" placeholder="JOHN DOE" value="{{ old('gsName') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="gsUser" class="form-label">Google Scholar User ID (Opsional)</label>
                <input type="text" name="gsUser" id="gsUser" class="form-control" placeholder="P_Rdw4AAAAAJ" value="{{ old('gsUser') }}">
                <span class="text-white-50" style="font-size: 0.75rem;">Kode ID di URL profil Google Scholar (misal: user=P_Rdw4AAAAAJ).</span>
            </div>
        </div>

        <div class="mb-4">
            <label for="keahlian" class="form-label">Bidang Keahlian Riset (Opsional)</label>
            <input type="text" name="keahlian" id="keahlian" class="form-control" placeholder="Sistem Informasi & Kecerdasan Buatan" value="{{ old('keahlian') }}">
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Data</button>
    </form>
</div>
@endsection
