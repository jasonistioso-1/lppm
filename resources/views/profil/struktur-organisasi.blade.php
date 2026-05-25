@extends('layouts.app')

@section('title', 'Struktur Organisasi | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('profil/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('profil/struktur-organisasi.css') }}" />
@endsection

@section('page-js')
  <script src="{{ asset('profil/struktur-organisasi.js') }}"></script>
@endsection

@section('content')
<section class="hero section org-hero">
      <div class="container org-hero-grid">
        <div class="hero-copy">
          <span class="badge">Profil · Struktur Organisasi</span>
          <h1>Struktur Organisasi LPPM IBI KKG</h1>
        
          <div class="hero-actions">
            <a href="#pohon-organisasi" class="btn btn-primary">Lihat Struktur</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="pohon-organisasi">
      <div class="container">
        <div class="section-head section-head-center">
          <div>
            <span class="section-tag">Struktur Organisasi</span>
            <h2>Susunan Jabatan</h2>
          </div>
        </div>

        @if($page)
          <div class="card card-glow-accent reveal" style="margin-bottom: 3rem; background: var(--panel-bg); border-radius: 12px; border: 1px solid var(--border-color); padding: 2.5rem;">
            <div class="card-icon-header" style="display: flex; align-items: center; gap: 15px; margin-bottom: 1.5rem;">
              <div class="icon-circle" style="width: 50px; height: 50px; border-radius: 50%; background: rgba(59, 130, 246, 0.1); display: flex; align-items: center; justify-content: center; color: var(--accent-color); font-size: 1.25rem;"><i class="fa-solid fa-sitemap"></i></div>
              <h3 style="font-size: 1.5rem; color: var(--text-color); margin: 0;">{{ $page->title }}</h3>
            </div>
            <div class="card-body-text" style="color: var(--text-muted); line-height: 1.8;">
              {!! $page->content !!}
            </div>
          </div>
        @endif

        <div class="org-layout">
          <div class="org-top-line"></div>

          <article class="leader-card card">
            <div class="leader-photo-wrap">
              <div class="photo-rotator leader-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Foto Ketua LPPM"
                  src="{{ asset('assets/images/struktur-organisasi/pakimam1.jpg') }}"
                  data-alt-src="{{ asset('assets/images/struktur-organisasi/pakimam2.png') }}"
                />
              </div>
            </div>

            <div class="leader-info">
              <span class="leader-label">Kepala LPPM</span>
              <h3>Dr. Imam Nuraryo, M.A.</h3>
              <p>
                Memimpin kebijakan strategis lembaga dan mengarahkan penelitian,
                pengabdian, publikasi, serta penguatan kerja sama institusi.
              </p>
              <div class="leader-meta">
                <div class="meta-pill">Pengarah Utama</div>
                <div class="meta-pill">Koordinator Kebijakan</div>
                <div class="meta-pill">Penanggung Jawab</div>
              </div>
              <a href="{{ route('profil.prestasi') }}#sertifikat-section" class="leader-award-badge">
                <i class="fa-solid fa-award"></i> Apresiasi Pengabdian Rektorat IBI KKG
              </a>
            </div>
          </article>

          <div class="org-main-line"></div>

          <div class="org-grid">
            <article class="org-card card">
              <span class="org-number">Koordinator Bidang</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Kesekretariatan dan Publikasi Ilmiah"
                  src="{{ asset('assets/images/struktur-organisasi/pakdede1.png') }}"
                  data-alt-src="{{ asset('assets/images/struktur-organisasi/pakdede2.png') }}"
                />
              </div>
              <h3>Dede Surya Atmaja, S.Pd</h3>
              <p class="org-role">Kesekretariatan dan Publikasi Ilmiah</p>
            </article>

            <article class="org-card card">
              <span class="org-number">Koordinator Bidang</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Penelitian"
                  src="{{ asset('assets/images/struktur-organisasi/pakzulfikar1.png') }}"
                  data-alt-src="{{ asset('assets/images/struktur-organisasi/pakzulfikar2.png') }}"
                />
              </div>
              <h3>Dr. Zulfikar Ikhsan Pane, S.E., Ak.</h3>
              <p class="org-role">Penelitian</p>
            </article>

            <article class="org-card card">
              <span class="org-number">Koordinator Bidang</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Chief Editor Jurnal Akuntansi"
                  src="{{ asset('assets/images/struktur-organisasi/pakhanif1.png') }}"
                  data-alt-src="{{ asset('assets/images/struktur-organisasi/pakhanif2.jpeg') }}"
                />
              </div>
              <h3>Prof. Dr. Hanif Ismail</h3>
              <p class="org-role">Chief Editor Jurnal Akuntansi</p>
            </article>

            <article class="org-card card">
              <span class="org-number">Koordinator Bidang</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Chief Editor Jurnal Ekonomi Perusahaan"
                  src="{{ asset('assets/images/struktur-organisasi/paksalam1.jpeg') }}"
                />
              </div>
              <h3>Salam Fadillah Alzah, S.Tr., MAB</h3>
              <p class="org-role">Chief Editor Jurnal Ekonomi Perusahaan</p>
            </article>

            <article class="org-card card">
              <span class="org-number">Koordinator Bidang</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Publikasi Ilmiah"
                  src="{{ asset('assets/images/struktur-organisasi/paktundo1.png') }}"
                />
              </div>
              <h3>Ir. Tundo, S.Kom., M.Kom</h3>
              <p class="org-role">Chief Editor Jurnal Informatika dan Bisnis</p>
            </article>

            <article class="org-card card">
              <span class="org-number">Koordinator Bidang</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Kemitraan dan Jejaring"
                  src="{{ asset('assets/images/struktur-organisasi/ibu1.png') }}"
                  data-alt-src="{{ asset('assets/images/struktur-organisasi/ibu2.png') }}"
                />
              </div>
              <h3>Kristin Handayani,S.Si.,M.M.</h3>
              <p class="org-role">Chief Editor Jurnal Abdimas</p>
            </article>

            <article class="org-card card">
              <span class="org-number">Koordinator Bidang</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Data dan Sistem"
                  src="{{ asset('assets/images/struktur-organisasi/foto81.JPG') }}"
                  data-alt-src="{{ asset('assets/images/struktur-organisasi/foto82.JPG') }}"
                />
              </div>
              <h3>Dr. Abdullah Rakhman</h3>
              <p class="org-role">Chief Editor Jurnal Manajemen</p>
            </article>

            <article class="org-card card">
              <span class="org-number">Koordinator Bidang</span>
              <div class="photo-rotator org-rotator">
                <img
                  class="photo-layer is-active"
                  alt="Evaluasi dan Mutu"
                  src="{{ asset('assets/images/struktur-organisasi/foto91.png') }}"
                  data-alt-src="{{ asset('assets/images/struktur-organisasi/foto92.png') }}"
                />
              </div>
              <h3>Yosafat Danis Murtiharso,S.Sn.,M.Sn.</h3>
              <p class="org-role">Chief Editor Jurnal Komunikasi dan Bisnis</p>
            </article>
          </div>
        </div>
      </div>
    </section>
@endsection
