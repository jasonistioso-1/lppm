@extends('layouts.app')

@section('title', 'Template | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('dokumen/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('dokumen/template.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Dokumen · Template</span>
          <h1>Template Dokumen LPPM</h1>
          <p>
            Halaman ini berisi template resmi yang digunakan dalam penyusunan
            proposal, laporan, dan dokumen administrasi lainnya.
          </p>
          <div class="hero-actions">
            <a href="#daftar-template" class="btn btn-primary">Lihat Template</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Template</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>{{ $documents->count() }}</strong>
                <span>Template Utama</span>
              </div>
              <div class="mini-stat">
                <strong>DOCX</strong>
                <span>Format</span>
              </div>
              <div class="mini-stat">
                <strong>Standar</strong>
                <span>Tata Naskah</span>
              </div>
              <div class="mini-stat">
                <strong>Siap Pakai</strong>
                <span>Status</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-template">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Template</span>
            <h2>Template Dokumen yang Tersedia</h2>
          </div>
          <p>
            Gunakan template berikut untuk memastikan format dokumen sesuai
            dengan standar administrasi LPPM.
          </p>
        </div>

        <div class="grid-3 template-grid">
          @forelse($documents as $document)
            <div class="card template-card">
              <div class="doc-item">
                <strong>{{ $document->title }}</strong>
                @if($document->file_path)
                  <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="btn btn-primary btn-sm" style="display: inline-block; padding: 4px 10px; font-size: 0.8rem;"><i class="fa-solid fa-download"></i> Unduh</a>
                @endif
              </div>
              <p>
                {{ $document->description }}
              </p>
            </div>
          @empty
            <p style="text-align: center; color: var(--text-muted); width: 100%;">Belum ada template tersedia.</p>
          @endforelse
        </div>
      </div>
    </section>
@endsection
