@extends('layouts.app')

@section('title', 'Data Abdimas | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('abdimas/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('abdimas/data-abdimas.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Abdimas · Data Abdimas</span>
          <h1>Data Kegiatan Abdimas</h1>
          <p>
            Halaman ini memuat rekap data pengabdian kepada masyarakat untuk
            kebutuhan pemantauan, dokumentasi, dan pelaporan lembaga.
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
                <strong>{{ $abdimas->count() }}</strong>
                <span>Total Abdimas</span>
              </div>
              <div class="mini-stat">
                <strong>{{ date('Y') }}</strong>
                <span>Tahun Aktif</span>
              </div>
              <div class="mini-stat">
                <strong>Mitra</strong>
                <span>Fokus Program</span>
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

    <section class="section" id="tabel-data">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Data Abdimas</span>
            <h2>Rekap Kegiatan yang Terdata</h2>
          </div>
          <p>
            Data berikut disusun untuk kebutuhan monitoring, dokumentasi, dan
            pelaporan kegiatan pengabdian kepada masyarakat.
          </p>
        </div>

        <div class="table-card">
          <div class="toolbar">
            <input
              type="text"
              class="search-input"
              placeholder="Cari program abdimas..."
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
                  <th>Program Abdimas</th>
                  <th>Ketua Pelaksana</th>
                  <th>Mitra Sasaran</th>
                  <th>Tahun</th>
                  <th>Status</th>
                  <th>Dokumen Kegiatan</th>
                </tr>
              </thead>
              <tbody>
                @forelse($abdimas as $item)
                  <tr>
                    <td>{{ $item->code ?? ('ABD-' . str_pad($item->id, 3, '0', STR_PAD_LEFT)) }}</td>
                    <td><strong>{{ $item->title }}</strong></td>
                    <td>{{ $item->leader }}</td>
                    <td>{{ $item->partner }}</td>
                    <td>{{ $item->year }}</td>
                    <td>
                      @php
                        $statusColors = [
                          'Berjalan' => ['bg' => 'rgba(37, 99, 235, 0.08)', 'color' => '#2563eb'],
                          'Review' => ['bg' => 'rgba(245, 158, 11, 0.08)', 'color' => '#d97706'],
                          'Selesai' => ['bg' => 'rgba(16, 185, 129, 0.08)', 'color' => '#059669'],
                          'Draft' => ['bg' => 'rgba(100, 116, 139, 0.08)', 'color' => '#64748b'],
                        ];
                        $colors = $statusColors[$item->service_status] ?? ['bg' => 'rgba(100, 116, 139, 0.08)', 'color' => '#64748b'];
                      @endphp
                      <span class="badge" style="background: {{ $colors['bg'] }}; color: {{ $colors['color'] }}; padding: 6px 12px; border-radius: 8px; font-weight:600;">
                        {{ $item->service_status }}
                      </span>
                    </td>
                    <td>
                      <div class="doc-links-wrap">
                        @if($item->proposal_file)
                          <a href="{{ asset('storage/' . $item->proposal_file) }}" target="_blank" class="btn-doc-download proposal"><i class="fa-solid fa-file-pdf"></i> Proposal</a>
                        @endif
                        @if($item->report_file)
                          <a href="{{ asset('storage/' . $item->report_file) }}" target="_blank" class="btn-doc-download akhir"><i class="fa-solid fa-file-circle-check"></i> Laporan</a>
                        @endif
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada data kegiatan abdimas terdaftar.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3>Monitoring Program</h3>
            <p>
              Data abdimas membantu pemantauan program dari tahap pengajuan,
              pelaksanaan, evaluasi, hingga penutupan kegiatan.
            </p>
          </div>

          <div class="card info-card">
            <h3>Dokumentasi Mitra</h3>
            <p>
              Setiap kegiatan dapat dilengkapi identitas mitra, lokasi, capaian,
              serta luaran program sebagai dokumentasi resmi lembaga.
            </p>
          </div>

          <div class="card info-card">
            <h3>Pelaporan Kinerja</h3>
            <p>
              Rekap kegiatan abdimas bermanfaat untuk pelaporan institusi,
              evaluasi tahunan, dan kebutuhan akreditasi.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
