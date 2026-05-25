@extends('layouts.app')

@section('title', 'Prestasi | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('profil/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('profil/prestasi.css') }}" />
@endsection

@section('page-js')
  <script src="{{ asset('profil/prestasi-slider.js') }}"></script>
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Profil · Prestasi</span>
          <h1>Prestasi LPPM IBI KKG</h1>
          <p>
            Halaman ini menampilkan berbagai penghargaan berupa hibah yang
            pernah diterima oleh akademisi LPPM IBIKKG maupun penghargaan yang
            diraih oleh LPPM IBIKKG sebagai sebuah lembaga penelitian dan
            pengabdian masyarakat.
          </p>
          <div class="hero-actions">
            <a href="#tentang-lppm" class="btn btn-primary">Pelajari Lebih Lanjut</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="award-showcase-visual">
            <div class="award-glow"></div>
            <i class="fa-solid fa-trophy main-trophy"></i>
            <div class="floating-badge fb-1"><i class="fa-solid fa-award"></i> <span>Sosro 2017</span></div>
            <div class="floating-badge fb-2"><i class="fa-solid fa-award"></i> <span>Dikantara 2016</span></div>
            <div class="floating-badge fb-3"><i class="fa-solid fa-award"></i> <span>Apresiasi Rektorat</span></div>
          </div>
        </div>
      </div>
    </section>

    <section class="section full-width-slider-section" id="prestasi-slider">
      <div class="slider-container">
        <h2 class="slider-title reveal">Penerimaan Hibah</h2>
        <p class="slider-subtitle reveal">
          Beberapa hibah yang pernah diterima oleh akademisi LPPM IBI KKG.
        </p>

        <div class="prestasi-hero-visual reveal hero-visual-clean prestasi-full-slider">
          <div class="hero-carousel hero-carousel-right prestasi-hero-carousel full-width-carousel"
            id="prestasiHeroCarousel">
            <div class="hero-carousel-track">
              <div class="hero-slide active" data-badge="Penghargaan Dosen"
                data-title="Pendanaan Penelitian Dosen Pemula 2026"
                data-description="Selamat kepada dosen IBI KKG atas peraihan hibah Kemdikti Saintek. Prestasi luar biasa dalam pengembangan riset kampus.">
                <img src="{{ asset('assets/images/LCD - Selamat dan Sukses Dosen IBIKKG].jpg') }}"
                  alt="Prestasi Penelitian Dosen" />
              </div>

              <div class="hero-slide" data-badge="Program Internasional"
                data-title="International Community Development Program"
                data-description="Prestasi abdimas tingkat internasional Palembang 2025 melalui kolaborasi global untuk pengembangan masyarakat.">
                <img src="{{ asset('assets/images/pkm2024.jpeg') }}" alt="Prestasi Internasional" />
              </div>

              <div class="hero-slide" data-badge="Kolaborasi Mitra" data-title="Abdimas Inmato.id"
                data-description="Pengabdian masyarakat melalui kemitraan strategis dengan mitra eksternal untuk dampak nyata di masyarakat.">
                <img src="{{ asset('assets/images/pkm2025.jpeg') }}" alt="Prestasi Abdimas" />
              </div>
            </div>

            <button class="hero-carousel-btn prev" type="button" id="prestasiHeroPrev" aria-label="Slide sebelumnya">
              &#10094;
            </button>

            <button class="hero-carousel-btn next" type="button" id="prestasiHeroNext" aria-label="Slide berikutnya">
              &#10095;
            </button>

            <div class="hero-carousel-dots" id="prestasiHeroDots">
              <button class="hero-dot active" type="button" data-slide="0" aria-label="Slide 1"></button>
              <button class="hero-dot" type="button" data-slide="1" aria-label="Slide 2"></button>
              <button class="hero-dot" type="button" data-slide="2" aria-label="Slide 3"></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="sertifikat-section">
      <div class="container">
        @if($page)
          <div class="card card-glow-accent reveal" style="margin-bottom: 3rem; background: var(--panel-bg); border-radius: 12px; border: 1px solid var(--border-color); padding: 2.5rem;">
            <div class="card-icon-header" style="display: flex; align-items: center; gap: 15px; margin-bottom: 1.5rem;">
              <div class="icon-circle" style="width: 50px; height: 50px; border-radius: 50%; background: rgba(59, 130, 246, 0.1); display: flex; align-items: center; justify-content: center; color: var(--accent-color); font-size: 1.25rem;"><i class="fa-solid fa-trophy"></i></div>
              <h3 style="font-size: 1.5rem; color: var(--text-color); margin: 0;">{{ $page->title }}</h3>
            </div>
            <div class="card-body-text" style="color: var(--text-muted); line-height: 1.8;">
              {!! $page->content !!}
            </div>
          </div>
        @endif

        <h2 class="slider-title reveal" style="font-size: 2.5rem; margin-bottom: 50px;">
          Sertifikat Penghargaan
        </h2>

        <div class="cert-grid">
          <div class="cert-card reveal" onclick="openCertViewer('../assets/images/prestasi_sosro.jpg', 'image')">
            <div class="cert-img-container">
              <img src="{{ asset('assets/images/prestasi_sosro.jpg') }}" alt="Piagam Penghargaan Sinar Sosro" />
              <div class="cert-overlay">
                <span>Lihat Sertifikat</span>
              </div>
            </div>
            <div class="cert-info">
              <h3>Piagam Penghargaan Kuliah Umum</h3>
              <p>PT Sinar Sosro (A Rekso Company) - 2017</p>
            </div>
          </div>

          <div class="cert-card reveal" onclick="openCertViewer('../assets/images/prestasi_dikantara.jpg', 'image')">
            <div class="cert-img-container">
              <img src="{{ asset('assets/images/prestasi_dikantara.jpg') }}" alt="Penghargaan Yayasan Dikantara" />
              <div class="cert-overlay">
                <span>Lihat Sertifikat</span>
              </div>
            </div>
            <div class="cert-info">
              <h3>Penghargaan Pelatihan Guru Dikantara</h3>
              <p>Yayasan Pendidikan Jakarta Utara - 2016</p>
            </div>
          </div>

          <div class="cert-card reveal"
            onclick="openCertViewer('../assets/images/prestasi_apresiasi_pakimam.png', 'image')">
            <div class="cert-img-container">
              <img src="{{ asset('assets/images/prestasi_apresiasi_pakimam.png') }}" alt="Sertifikat Apresiasi Kepala LPPM" />
              <div class="cert-overlay">
                <span>Lihat Sertifikat</span>
              </div>
            </div>
            <div class="cert-info">
              <h3>Sertifikat Apresiasi Kepala LPPM</h3>
              <p>Rektorat IBI KKG - 2021</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div id="certModal" class="cert-modal">
      <div class="modal-overlay" onclick="closeCertViewer()"></div>
      <div class="modal-wrapper">
        <button class="modal-close" onclick="closeCertViewer()">&times;</button>
        <div class="modal-body">
          <iframe id="pdfFrame" src="" frameborder="0" style="display: none;"></iframe>
          <img id="imgFrame" src="" alt="Sertifikat Detail" style="display: none;" />
        </div>
      </div>
    </div>
@endsection
