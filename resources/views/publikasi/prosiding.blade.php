@extends('layouts.app')

@section('title', 'Prosiding | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('publikasi/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('publikasi/prosiding.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Publikasi · Prosiding</span>
          <h1>Daftar Prosiding</h1>
          <p>
            Halaman ini memuat kegiatan prosiding dan konferensi yang relevan
            dengan luaran penelitian maupun kegiatan ilmiah LPPM.
          </p>
          <div class="hero-actions">
            <a href="#daftar-prosiding" class="btn btn-primary">Lihat Prosiding</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Prosiding</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>{{ $publications->count() }}</strong>
                <span>Prosiding Terbit</span>
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

    <section class="section" id="daftar-prosiding">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Prosiding</span>
            <h2>Daftar Prosiding Kegiatan Ilmiah</h2>
          </div>
          <p>
            Prosiding berikut dapat menjadi alternatif luaran untuk seminar,
            konferensi, dan forum ilmiah terpilih.
          </p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th style="width: 80px;">No</th>
                  <th>Judul Kegiatan</th>
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
                    <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada prosiding terdaftar.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3>Forum Ilmiah</h3>
            <p>
              Prosiding mendukung publikasi hasil penelitian yang dipresentasikan
              pada seminar atau konferensi ilmiah.
            </p>
          </div>

          <div class="card info-card">
            <h3>Jejaring Akademik</h3>
            <p>
              Kegiatan prosiding membuka peluang kolaborasi dengan peneliti,
              dosen, dan institusi dari berbagai bidang.
            </p>
          </div>

          <div class="card info-card">
            <h3>Luaran Terukur</h3>
            <p>
              Prosiding menjadi salah satu bentuk luaran yang dapat didokumentasikan
              untuk kebutuhan evaluasi dan pelaporan lembaga.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
