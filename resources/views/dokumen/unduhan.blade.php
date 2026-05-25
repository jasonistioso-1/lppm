@extends('layouts.app')

@section('title', 'Unduhan | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('dokumen/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('dokumen/unduhan.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Dokumen · Unduhan</span>
          <h1>File Unduhan LPPM</h1>
          <p>
            Halaman ini memuat berbagai file pendukung yang dapat diunduh untuk
            kebutuhan administrasi, pelaporan, dan pengelolaan kegiatan.
          </p>
          <div class="hero-actions">
            <a href="#daftar-unduhan" class="btn btn-primary">Lihat Unduhan</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan File</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>{{ $documents->count() }}</strong>
                <span>File Tersedia</span>
              </div>
              <div class="mini-stat">
                <strong>PDF</strong>
                <span>Jenis Umum</span>
              </div>
              <div class="mini-stat">
                <strong>XLSX</strong>
                <span>Format Lain</span>
              </div>
              <div class="mini-stat">
                <strong>Aktif</strong>
                <span>Status</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-unduhan">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Unduhan</span>
            <h2>Daftar File yang Tersedia</h2>
          </div>
          <p>
            File berikut dapat diunduh untuk mendukung pengajuan, administrasi,
            dan pelaporan kegiatan yang dikelola LPPM.
          </p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th>Nama File</th>
                  <th>Format</th>
                  <th>Ukuran</th>
                  <th>Unduh</th>
                </tr>
              </thead>
              <tbody>
                @forelse($documents as $document)
                  <tr>
                    <td>
                      <strong>{{ $document->title }}</strong>
                      <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px; line-height: 1.4;">{{ $document->description }}</p>
                    </td>
                    <td>{{ pathinfo($document->file_path, PATHINFO_EXTENSION) ? strtoupper(pathinfo($document->file_path, PATHINFO_EXTENSION)) : 'PDF' }}</td>
                    <td>{{ $document->file_size ?? 'N/A' }}</td>
                    <td>
                      @if($document->file_path)
                        <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="btn btn-primary btn-sm" style="display: inline-block; padding: 4px 10px; font-size: 0.8rem;"><i class="fa-solid fa-download"></i> Unduh</a>
                      @else
                        N/A
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada file unduhan tersedia.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3>Akses Cepat</h3>
            <p>
              File unduhan disusun agar dosen dan admin dapat mengakses dokumen
              penting secara cepat dan terpusat.
            </p>
          </div>

          <div class="card info-card">
            <h3>Dokumen Pendukung</h3>
            <p>
              Setiap file dapat digunakan sebagai pelengkap proses pengajuan,
              pelaporan, atau kebutuhan administrasi lainnya.
            </p>
          </div>

          <div class="card info-card">
            <h3>Pembaruan Berkala</h3>
            <p>
              Daftar file perlu diperbarui secara berkala agar versi dokumen yang
              digunakan selalu sesuai ketentuan terbaru.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
