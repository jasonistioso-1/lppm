@extends('layouts.app')

@section('title', 'Jurnal | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('publikasi/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('publikasi/jurnal.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section jurnal-hero">
      <div class="container jurnal-hero-grid">
        <div class="hero-copy">
          <span class="badge">Publikasi · Jurnal</span>

          <div class="hero-title-row">
            <h1>Jurnal Publikasi</h1>

            <div class="index-marquee hero-marquee" aria-label="Index jurnal publikasi">
              <div class="index-marquee-track">
                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/sinta.png') }}" alt="SINTA" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/google-scholar.png') }}" alt="Google Scholar" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/garuda.png') }}" alt="GARUDA" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/crossreff.png') }}" alt="Crossref" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/indexcopernicus.png') }}" alt="Index Copernicus" />
                </div>

                <div class="index-marquee-item">
                  <img src="{{ asset('assets/images/index/dimensions.webp') }}" alt="Dimensions" />
                </div>
              </div>
            </div>
          </div>

          <div class="hero-actions">
            <a href="#daftar-jurnal" class="btn btn-primary">Daftar Jurnal</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-jurnal">
      <div class="container">
        <div class="section-head section-head-center">
          <div>
            <span class="section-tag">Direktori Jurnal</span>
            <h2>Daftar Jurnal</h2>
          </div>
        </div>

        <div class="journal-grid">
          @forelse($publications as $publication)
            @php
              $coverPath = Str::startsWith($publication->cover, 'assets/') ? asset($publication->cover) : asset('storage/' . $publication->cover);
              $badgePath = Str::startsWith($publication->indexing_badge, 'assets/') ? asset($publication->indexing_badge) : ($publication->indexing_badge ? asset('storage/' . $publication->indexing_badge) : null);
            @endphp
            <article class="journal-card card">
              @auth
                <div class="admin-edit-card-header" style="background: rgba(0,0,0,0.05); padding: 8px 16px; border-bottom: 1px solid rgba(0,0,0,0.06); display: flex; justify-content: space-between; align-items: center; position: relative; z-index: 10;">
                  <span style="font-size: 0.68rem; color: #0072ff; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px;"><i class="fa-solid fa-shield-halved"></i> Kontrol Admin</span>
                  <a href="{{ route('admin.publikasi.edit', $publication->id) }}" target="_blank" style="background: #ff9900; color: #fff; padding: 3px 8px; border-radius: 4px; font-size: 0.65rem; font-weight: bold; text-decoration: none; display: inline-flex; align-items: center; gap: 3px; border: 1px solid rgba(255,255,255,0.15);">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Jurnal
                  </a>
                </div>
              @endauth
              @if($badgePath)
                <div class="journal-index-ribbon">
                  <img src="{{ $badgePath }}" alt="Indexing" />
                </div>
              @endif

              <div class="journal-cover" style="height: 280px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                <img src="{{ $coverPath }}" alt="{{ $publication->title }}" style="width: 100%; height: 100%; object-fit: cover;" />
              </div>

              <div class="journal-content" style="padding: 1.5rem;">
                <h3 style="font-size: 1.25rem; color: var(--text-color); margin-bottom: 0.75rem;">{{ $publication->title }}</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {{ $publication->authors }}
                </p>

                <div class="journal-actions" style="display: flex; gap: 10px;">
                  <a
                    href="{{ $publication->url ? (Str::startsWith($publication->url, '/') ? url($publication->url) : $publication->url) : '#' }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn btn-primary btn-sm"
                  >
                    Selengkapnya
                  </a>

                  @if($publication->file_path)
                    <a
                      href="{{ asset('storage/' . $publication->file_path) }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="btn btn-white btn-sm"
                    >
                      Unduh PDF
                    </a>
                  @endif
                </div>
              </div>
            </article>
          @empty
            <p style="text-align: center; width: 100%; color: var(--text-muted); padding: 2rem;">Belum ada daftar jurnal tersedia.</p>
          @endforelse
        </div>
      </div>
    </section>
@endsection
