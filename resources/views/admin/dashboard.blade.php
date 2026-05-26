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
    <h3 class="fw-bold mb-3 text-info"><i class="fa-solid fa-graduation-cap me-2"></i> Panduan Pengelolaan &amp; Pemetaan Navbar LPPM IBI KKG</h3>
    <p class="text-white-50">
        Sebagai Administrator, tindakan yang Anda lakukan di panel admin ini akan langsung memengaruhi dan memperbarui halaman depan website LPPM. Berikut adalah panduan pemetaan perubahan untuk setiap menu:
    </p>
    
    <div class="row mt-4">
        <!-- Panduan 1 -->
        <div class="col-md-6 mb-4">
            <div class="p-4 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5" style="border-left: 4px solid var(--accent-secondary) !important;">
                <h5 class="fw-bold text-white d-flex align-items-center gap-2">
                    <span class="badge bg-primary bg-opacity-25 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem;">1</span>
                    Mengelola Slider &amp; Banner Utama
                </h5>
                <p class="text-white-50 small mt-2 mb-0">
                    Masuk ke menu <strong class="text-info">Beranda &gt; Slider Banner</strong>. Setiap banner baru yang Anda tambahkan (dengan status <span class="badge bg-success bg-opacity-10 text-success small">Aktif</span>) akan memunculkan gambar slide besar, judul, deskripsi, dan tombol aksi di bagian paling atas beranda depan (<strong class="text-warning">Hero Carousel</strong>).
                </p>
            </div>
        </div>

        <!-- Panduan 2 -->
        <div class="col-md-6 mb-4">
            <div class="p-4 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5" style="border-left: 4px solid var(--accent-secondary) !important;">
                <h5 class="fw-bold text-white d-flex align-items-center gap-2">
                    <span class="badge bg-primary bg-opacity-25 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem;">2</span>
                    Menerbitkan Berita Terbaru
                </h5>
                <p class="text-white-50 small mt-2 mb-0">
                    Masuk ke menu <strong class="text-info">Beranda &gt; Berita Utama</strong>. Menambah berita baru dengan status <span class="badge bg-success bg-opacity-10 text-success small">Diterbitkan</span> secara otomatis akan menampilkan poster dan ringkasan berita di bagian <strong class="text-warning">Berita Terbaru</strong> di halaman beranda depan. Berita dapat diklik untuk membuka modal berisi teks lengkapnya.
                </p>
            </div>
        </div>

        <!-- Panduan 3 -->
        <div class="col-md-6 mb-4">
            <div class="p-4 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5" style="border-left: 4px solid var(--accent-secondary) !important;">
                <h5 class="fw-bold text-white d-flex align-items-center gap-2">
                    <span class="badge bg-primary bg-opacity-25 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem;">3</span>
                    Mengubah Submenu "Profil"
                </h5>
                <p class="text-white-50 small mt-2 mb-0">
                    Masuk ke menu <strong class="text-info">Profil Lembaga</strong>. Mengedit tulisan atau sejarah di halaman ini akan langsung mengubah isi konten yang muncul ketika pengunjung mengklik submenu navbar depan: <strong class="text-warning">PROFIL &gt; Tentang Kami</strong>, <strong class="text-warning">Visi &amp; Misi</strong>, <strong class="text-warning">Struktur Organisasi</strong>, atau <strong class="text-warning">Prestasi</strong> secara instan.
                </p>
            </div>
        </div>

        <!-- Panduan 4 -->
        <div class="col-md-6 mb-4">
            <div class="p-4 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5" style="border-left: 4px solid var(--accent-secondary) !important;">
                <h5 class="fw-bold text-white d-flex align-items-center gap-2">
                    <span class="badge bg-primary bg-opacity-25 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem;">4</span>
                    Memetakan Profil Dosen ke "Akademisi"
                </h5>
                <p class="text-white-50 small mt-2 mb-0">
                    Masuk ke menu <strong class="text-info">Akademisi (Dosen)</strong>. Setiap Anda mendaftarkan dosen baru, pastikan untuk memilih <strong class="text-warning">Program Studi</strong> yang sesuai (misal: <em class="text-info">Akuntansi</em>). Dosen tersebut akan otomatis terdaftar dan terpampang secara rapi pada halaman submenu navbar depan: <strong class="text-warning">AKADEMISI &gt; Akuntansi</strong>.
                </p>
            </div>
        </div>

        <!-- Panduan 5 -->
        <div class="col-md-6 mb-4">
            <div class="p-4 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5" style="border-left: 4px solid var(--accent-secondary) !important;">
                <h5 class="fw-bold text-white d-flex align-items-center gap-2">
                    <span class="badge bg-primary bg-opacity-25 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem;">5</span>
                    Menampilkan Video Kegiatan YouTube
                </h5>
                <p class="text-white-50 small mt-2 mb-0">
                    Masuk ke menu <strong class="text-info">Beranda &gt; Video YouTube</strong>. Tambahkan tautan URL YouTube standar apa pun (misal kegiatan KKN). Sistem kami secara otomatis mem-parsing URL tersebut menjadi format embed sehingga video player responsif dapat diputar langsung di beranda bagian <strong class="text-warning">Video</strong>.
                </p>
            </div>
        </div>

        <!-- Panduan 6 -->
        <div class="col-md-6 mb-4">
            <div class="p-4 border border-secondary border-opacity-10 rounded-3 h-100 bg-white bg-opacity-5" style="border-left: 4px solid var(--accent-secondary) !important;">
                <h5 class="fw-bold text-white d-flex align-items-center gap-2">
                    <span class="badge bg-primary bg-opacity-25 text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 28px; height: 28px; font-size: 0.85rem;">6</span>
                    Mengubah Kontak &amp; Lokasi Kampus
                </h5>
                <p class="text-white-50 small mt-2 mb-0">
                    Masuk ke menu <strong class="text-info">Kontak &amp; Layanan</strong>. Mengubah informasi email, alamat kantor, jam operasional, nomor WA, atau link Google Maps di sini secara otomatis akan memperbarui seluruh <strong class="text-warning">Footer</strong> (bagian bawah web) secara global dan halaman menu kontak depan secara real-time.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
