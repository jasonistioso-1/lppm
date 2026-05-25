@extends('layouts.admin')

@section('title', 'Admin Dashboard - LPPM')
@section('header_title', 'Ringkasan Dashboard')

@section('content')
<div class="row">
    <!-- Stat Card 1 -->
    <div class="col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(0, 114, 255, 0.05) 0%, rgba(0, 198, 255, 0.05) 100%);">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold">Total Akademisi (Dosen)</span>
                <h1 class="display-4 fw-bold mt-2 text-primary" style="background: linear-gradient(135deg, #0072ff 0%, #00c6ff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $dosenCount }}</h1>
                <p class="text-white-50 mb-0 mt-3 small">Berasal dari 8 Program Studi aktif.</p>
            </div>
            <div class="fs-1 text-primary bg-primary bg-opacity-10 p-4 rounded-4">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(0, 198, 255, 0.05) 0%, rgba(0, 240, 255, 0.05) 100%);">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold">Total Berita Terpublikasi</span>
                <h1 class="display-4 fw-bold mt-2 text-info" style="background: linear-gradient(135deg, #00c6ff 0%, #00f0ff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $beritaCount }}</h1>
                <p class="text-white-50 mb-0 mt-3 small">Tampil di slider berita utama.</p>
            </div>
            <div class="fs-1 text-info bg-info bg-opacity-10 p-4 rounded-4">
                <i class="fa-solid fa-newspaper"></i>
            </div>
        </div>
    </div>
</div>

<div class="glass-card mt-4">
    <h3 class="fw-bold mb-3"><i class="fa-solid fa-hand-wave text-warning me-2"></i> Selamat Datang Kembali!</h3>
    <p class="text-white-50">
        Anda masuk sebagai administrator website LPPM IBI Kwik Kian Gie. Melalui panel administrasi ini, Anda memiliki kendali penuh atas data-data dinamis website:
    </p>
    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <div class="p-3 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5">
                <h5 class="fw-bold text-info"><i class="fa-solid fa-graduation-cap me-2"></i> Kelola Akademisi</h5>
                <p class="text-white-50 small mb-0">Tambah, perbarui, atau hapus profil dosen, program studi, bidang keahlian, dan user Google Scholar. Data dosen disinkronkan secara langsung ke halaman masing-masing prodi dengan search filter otomatis.</p>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="p-3 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5">
                <h5 class="fw-bold text-primary"><i class="fa-solid fa-newspaper me-2"></i> Kelola Berita</h5>
                <p class="text-white-50 small mb-0">Unggah poster berita, tulis rincian pengumuman lengkap dalam format HTML, dan atur tautan navigasi. Berita baru akan langsung berputar secara mulus di infinite scrolling track halaman beranda.</p>
            </div>
        </div>
    </div>
</div>
@endsection
