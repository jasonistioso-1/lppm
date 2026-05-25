@extends('layouts.app')

@section('title', 'Artikel Ilmiah | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('publikasi/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('publikasi/artikel-ilmiah.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Publikasi · Artikel Ilmiah</span>
          <h1>Daftar Artikel Ilmiah</h1>
          <p>
            Halaman ini memuat artikel ilmiah yang relevan dengan bidang bisnis,
            informatika, komunikasi, dan kegiatan akademik LPPM.
          </p>
          <div class="hero-actions">
            <a href="#daftar-artikel" class="btn btn-primary">Lihat Artikel</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Artikel</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>{{ $publications->count() }}</strong>
                <span>Artikel Aktif</span>
              </div>
              <div class="mini-stat">
                <strong>{{ date('Y') }}</strong>
                <span>Tahun Terbit</span>
              </div>
              <div class="mini-stat">
                <strong>LPPM</strong>
                <span>Pengelola</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-artikel">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Artikel Ilmiah</span>
            <h2>Daftar Artikel Terpublikasi</h2>
          </div>
          <p>
            Artikel ilmiah berikut dapat menjadi referensi pengembangan riset
            sekaligus dokumentasi luaran akademik institusi.
          </p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th style="width: 80px;">No</th>
                  <th>Judul Artikel</th>
                  <th>Penulis / Dosen</th>
                  <th>Tahun</th>
                  <th>Tautan / File</th>
                </tr>
              </thead>
              <tbody>
                @forelse($publications as $index => $publication)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $publication->title }}</strong></td>
                    <td>{{ $publication->authors }}</td>
                    <td>{{ $publication->year }}</td>
                    <td>
                      @if($publication->url)
                        <a href="{{ $publication->url }}" target="_blank" class="btn btn-primary btn-sm" style="display: inline-block; padding: 4px 10px; font-size: 0.8rem;"><i class="fa-solid fa-arrow-up-right-from-square"></i> Link</a>
                      @endif
                      @if($publication->file_path)
                        <a href="{{ asset('storage/' . $publication->file_path) }}" target="_blank" class="btn btn-white btn-sm" style="display: inline-block; padding: 4px 10px; font-size: 0.8rem;"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada artikel ilmiah terdaftar.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3>Dokumentasi Luaran</h3>
            <p>
              Artikel ilmiah membantu mendokumentasikan hasil penelitian dan
              memperlihatkan kontribusi akademik sivitas institusi.
            </p>
          </div>

          <div class="card info-card">
            <h3>Referensi Akademik</h3>
            <p>
              Artikel dapat digunakan sebagai referensi pengembangan topik riset,
              pembelajaran, maupun pengabdian kepada masyarakat.
            </p>
          </div>

          <div class="card info-card">
            <h3>Penguatan Reputasi</h3>
            <p>
              Publikasi artikel ilmiah mendukung penguatan reputasi akademik
              lembaga di tingkat nasional maupun internasional.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
