@extends('layouts.admin')

@section('title', 'Admin Dashboard - LPPM')
@section('header_title', 'Ringkasan Dashboard')

@section('content')
<div class="row">
    <!-- Stat Card 1: Dosen -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(0, 114, 255, 0.05) 0%, rgba(0, 198, 255, 0.05) 100%); margin-bottom: 0;">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold" style="font-size: 0.75rem;">Akademisi (Dosen)</span>
                <h2 class="fw-bold mt-2 text-primary" style="background: linear-gradient(135deg, #0072ff 0%, #00c6ff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 2.2rem;">{{ $dosenCount }}</h2>
            </div>
            <div class="fs-2 text-primary bg-primary bg-opacity-10 p-3 rounded-3">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 2: Berita -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(0, 198, 255, 0.05) 0%, rgba(0, 240, 255, 0.05) 100%); margin-bottom: 0;">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold" style="font-size: 0.75rem;">Berita Utama</span>
                <h2 class="fw-bold mt-2 text-info" style="background: linear-gradient(135deg, #00c6ff 0%, #00f0ff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 2.2rem;">{{ $beritaCount }}</h2>
            </div>
            <div class="fs-2 text-info bg-info bg-opacity-10 p-3 rounded-3">
                <i class="fa-solid fa-newspaper"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 3: Video -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(0, 114, 255, 0.05) 0%, rgba(0, 198, 255, 0.05) 100%); margin-bottom: 0;">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold" style="font-size: 0.75rem;">Video YouTube</span>
                <h2 class="fw-bold mt-2 text-warning" style="background: linear-gradient(135deg, #ff9f43 0%, #ffc048 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 2.2rem;">{{ $videoCount }}</h2>
            </div>
            <div class="fs-2 text-warning bg-warning bg-opacity-10 p-3 rounded-3">
                <i class="fa-solid fa-circle-play"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 4: Penelitian -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(0, 114, 255, 0.05) 0%, rgba(0, 198, 255, 0.05) 100%); margin-bottom: 0;">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold" style="font-size: 0.75rem;">Data Penelitian</span>
                <h2 class="fw-bold mt-2 text-success" style="background: linear-gradient(135deg, #28c76f 0%, #48dbfb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 2.2rem;">{{ $penelitianCount }}</h2>
            </div>
            <div class="fs-2 text-success bg-success bg-opacity-10 p-3 rounded-3">
                <i class="fa-solid fa-flask"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Stat Card 5: Abdimas -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(255,255,255,0.01) 0%, rgba(255,255,255,0.03) 100%); margin-bottom: 0;">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold" style="font-size: 0.75rem;">Data Abdimas</span>
                <h2 class="fw-bold mt-2 text-white" style="font-size: 2rem;">{{ $abdimasCount }}</h2>
            </div>
            <div class="fs-2 text-white-50 bg-white bg-opacity-5 p-3 rounded-3">
                <i class="fa-solid fa-users-line"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 6: Publikasi -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(255,255,255,0.01) 0%, rgba(255,255,255,0.03) 100%); margin-bottom: 0;">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold" style="font-size: 0.75rem;">Publikasi Ilmiah</span>
                <h2 class="fw-bold mt-2 text-white" style="font-size: 2rem;">{{ $publikasiCount }}</h2>
            </div>
            <div class="fs-2 text-white-50 bg-white bg-opacity-5 p-3 rounded-3">
                <i class="fa-solid fa-book-open"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 7: Dokumen -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(255,255,255,0.01) 0%, rgba(255,255,255,0.03) 100%); margin-bottom: 0;">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold" style="font-size: 0.75rem;">Dokumen &amp; Unduhan</span>
                <h2 class="fw-bold mt-2 text-white" style="font-size: 2rem;">{{ $dokumenCount }}</h2>
            </div>
            <div class="fs-2 text-white-50 bg-white bg-opacity-5 p-3 rounded-3">
                <i class="fa-solid fa-file-pdf"></i>
            </div>
        </div>
    </div>

    <!-- Stat Card 8: Galeri & Slider -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="glass-card h-100 d-flex align-items-center justify-content-between p-4" style="background: linear-gradient(135deg, rgba(255,255,255,0.01) 0%, rgba(255,255,255,0.03) 100%); margin-bottom: 0;">
            <div>
                <span class="text-white-50 small uppercase font-weight-bold" style="font-size: 0.75rem;">Galeri &amp; Slider</span>
                <h2 class="fw-bold mt-2 text-white" style="font-size: 2rem;">{{ $galleryCount + $sliderCount }}</h2>
            </div>
            <div class="fs-2 text-white-50 bg-white bg-opacity-5 p-3 rounded-3">
                <i class="fa-solid fa-image"></i>
            </div>
        </div>
    </div>
</div>

<div class="glass-card mt-2">
    <h3 class="fw-bold mb-3"><i class="fa-solid fa-hand-wave text-warning me-2"></i> Selamat Datang Kembali!</h3>
    <p class="text-white-50">
        Anda masuk sebagai administrator website LPPM IBI Kwik Kian Gie. Melalui panel administrasi kustom ini, Anda memiliki kendali penuh atas data-data dinamis website yang berlaras indah menyesuaikan tema branding Kwik Kian Gie.
    </p>
    
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="p-3 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5">
                <h5 class="fw-bold text-info"><i class="fa-solid fa-house me-2"></i> Kelola Beranda</h5>
                <p class="text-white-50 small mb-0">Kelola slider banner utama, berita track berputar, video YouTube LPPM, agenda monev/sosialisasi, dan galeri dokumentasi foto kegiatan secara dinamis.</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="p-3 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5">
                <h5 class="fw-bold text-primary"><i class="fa-solid fa-graduation-cap me-2"></i> Kelola Akademisi</h5>
                <p class="text-white-50 small mb-0">Kelola profil dosen lengkap dari 6 Program Studi aktif beserta keahlian, Google Scholar, SINTA, Scopus, dan pas foto resmi dengan batas upload 1MB terkompresi otomatis.</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="p-3 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5">
                <h5 class="fw-bold text-success"><i class="fa-solid fa-flask me-2"></i> Kelola Penelitian &amp; Abdimas</h5>
                <p class="text-white-50 small mb-0">Kelola skema pengajuan hibah, data laporan penelitian, laporan pengabdian masyarakat (Abdimas) beserta dokumen PDF lampirannya.</p>
            </div>
        </div>
    </div>
</div>
@endsection
