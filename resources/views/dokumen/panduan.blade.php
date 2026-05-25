@extends('layouts.app')

@section('title', 'Panduan | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('dokumen/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('dokumen/panduan.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">

        <div class="hero-copy">
          <span class="badge">Dokumen · Panduan</span>
          <h1>Panduan Resmi LPPM</h1>
          <p>
            Halaman ini memuat panduan pelaksanaan kegiatan penelitian,
            pengabdian kepada masyarakat, serta pelaporan yang digunakan
            dalam lingkungan LPPM.
          </p>

          <div class="hero-actions">
            <a href="#daftar-panduan" class="btn btn-primary">Lihat Panduan</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Dokumen</h3>
            </div>

            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>{{ $documents->count() }}</strong>
                <span>Panduan Utama</span>
              </div>
              <div class="mini-stat">
                <strong>PDF</strong>
                <span>Format</span>
              </div>
              <div class="mini-stat">
                <strong>2026</strong>
                <span>Versi</span>
              </div>
              <div class="mini-stat">
                <strong>Resmi</strong>
                <span>Status</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="section" id="daftar-panduan">
      <div class="container">

        <div class="section-head">
          <div>
            <span class="section-tag">Panduan</span>
            <h2>Daftar Panduan yang Tersedia</h2>
          </div>
          <p>
            Dokumen panduan berikut digunakan sebagai acuan pelaksanaan dan
            administrasi kegiatan di bawah pengelolaan LPPM.
          </p>
        </div>

        <div class="content-stack">
          @forelse($documents as $document)
            <div class="card doc-card">
              <div class="doc-item">
                <strong>{{ $document->title }}</strong>
                @if($document->file_path)
                  <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="btn btn-primary btn-sm" style="display: inline-block; padding: 4px 10px; font-size: 0.8rem;"><i class="fa-solid fa-download"></i> Unduh</a>
                @endif
              </div>
              <p>{{ $document->description }}</p>
            </div>
          @empty
            <p style="text-align: center; color: var(--text-muted); width: 100%;">Belum ada panduan tersedia.</p>
          @endforelse
        </div>

      </div>
    </section>
@endsection
