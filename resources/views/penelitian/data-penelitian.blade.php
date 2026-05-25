@extends('layouts.app')

@section('title', 'Data Penelitian | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('penelitian/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('penelitian/data-penelitian.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Penelitian · Data Penelitian</span>
          <h1>Data Penelitian Dosen</h1>
          <p>
            Halaman ini menampilkan rekap data penelitian yang dapat digunakan
            untuk monitoring, dokumentasi, serta kebutuhan pelaporan lembaga.
          </p>
          <div class="hero-actions">
            <a href="#tabel-data" class="btn btn-primary">Lihat Data</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Data</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>{{ $researches->count() }}</strong>
                <span>Total Riset</span>
              </div>
              <div class="mini-stat">
                <strong>{{ date('Y') }}</strong>
                <span>Tahun Aktif</span>
              </div>
              <div class="mini-stat">
                <strong>Jurnal</strong>
                <span>Luaran Dominan</span>
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

    <section class="section data-section" id="tabel-data">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Data Penelitian</span>
            <h2>Rekap Penelitian yang Terdata</h2>
          </div>
          <p>
            Data berikut disusun untuk kebutuhan monitoring, dokumentasi, dan
            pelaporan penelitian lembaga.
          </p>
        </div>

        <div class="table-card">
          <div class="toolbar">
            <input
              type="text"
              class="search-input"
              placeholder="Cari judul penelitian..."
            />
            <select class="filter-select">
              <option>Semua Tahun</option>
              <option>2026</option>
              <option>2025</option>
              <option>2024</option>
            </select>
          </div>

          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Judul Penelitian</th>
                  <th>Ketua Peneliti</th>
                  <th>Tahun</th>
                  <th>Status</th>
                  <th>Luaran</th>
                  <th>Dokumen Kegiatan</th>
                </tr>
              </thead>
              <tbody>
                @forelse($researches as $research)
                  <tr>
                    <td>{{ $research->code ?? ('PNL-' . str_pad($research->id, 3, '0', STR_PAD_LEFT)) }}</td>
                    <td><strong>{{ $research->title }}</strong></td>
                    <td>{{ $research->leader }}</td>
                    <td>{{ $research->year }}</td>
                    <td>
                      @php
                        $statusColors = [
                          'Berjalan' => ['bg' => 'rgba(37, 99, 235, 0.08)', 'color' => '#2563eb'],
                          'Review' => ['bg' => 'rgba(245, 158, 11, 0.08)', 'color' => '#d97706'],
                          'Selesai' => ['bg' => 'rgba(16, 185, 129, 0.08)', 'color' => '#059669'],
                          'Draft' => ['bg' => 'rgba(100, 116, 139, 0.08)', 'color' => '#64748b'],
                        ];
                        $colors = $statusColors[$research->research_status] ?? ['bg' => 'rgba(100, 116, 139, 0.08)', 'color' => '#64748b'];
                      @endphp
                      <span class="badge" style="background: {{ $colors['bg'] }}; color: {{ $colors['color'] }}; padding: 6px 12px; border-radius: 8px; font-weight:600;">
                        {{ $research->research_status }}
                      </span>
                    </td>
                    <td>{{ $research->output_type }}</td>
                    <td>
                      <div class="doc-links-wrap">
                        @if($research->proposal_file)
                          <a href="{{ asset('storage/' . $research->proposal_file) }}" target="_blank" class="btn-doc-download proposal"><i class="fa-solid fa-file-pdf"></i> Proposal</a>
                        @endif
                        @if($research->report_file)
                          <a href="{{ asset('storage/' . $research->report_file) }}" target="_blank" class="btn-doc-download akhir"><i class="fa-solid fa-file-circle-check"></i> Laporan</a>
                        @endif
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada data penelitian terdaftar.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 data-info-grid">
          <div class="card info-card">
            <h3>Monitoring Progres</h3>
            <p>
              Data penelitian dapat digunakan untuk memantau status proposal,
              proses review, penelitian berjalan, hingga penyelesaian luaran.
            </p>
          </div>

          <div class="card info-card">
            <h3>Dokumentasi Luaran</h3>
            <p>
              Setiap data penelitian dapat dilengkapi dengan jurnal, prosiding,
              HKI, atau bentuk luaran lain yang relevan.
            </p>
          </div>

          <div class="card info-card">
            <h3>Pelaporan Lembaga</h3>
            <p>
              Rekap data ini dapat dipakai untuk kebutuhan akreditasi, laporan
              tahunan, dan evaluasi kinerja penelitian institusi.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
