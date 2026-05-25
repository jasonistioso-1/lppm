@extends('layouts.app')

@section('title', 'Jam Layanan | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('kontak/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('kontak/jam-layanan.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Kontak · Jam Layanan</span>
          <h1>Jam Layanan LPPM</h1>
          <p>
            Halaman ini memuat informasi waktu operasional layanan untuk
            membantu dosen, tenaga kependidikan, dan pihak mitra melakukan koordinasi.
          </p>
          <div class="hero-actions">
            <a href="#jam-operasional" class="btn btn-primary">Lihat Jam Layanan</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Operasional</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>Senin</strong>
                <span>Hari Kerja</span>
              </div>
              <div class="mini-stat">
                <strong>08.00</strong>
                <span>Jam Buka</span>
              </div>
              <div class="mini-stat">
                <strong>16.00</strong>
                <span>Jam Tutup</span>
              </div>
              <div class="mini-stat">
                <strong>Minggu</strong>
                <span>Tutup</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="jam-operasional">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Jam Layanan</span>
            <h2>Waktu Operasional Layanan</h2>
          </div>
          <p>
            Pastikan komunikasi dan pengajuan dokumen dilakukan sesuai dengan
            jam operasional yang telah ditetapkan.
          </p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th>Hari</th>
                  <th>Jam</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Senin - Jumat</td>
                  <td>{{ $contact->office_hours ?? '08.00 - 16.00' }}</td>
                  <td>Buka</td>
                </tr>
                <tr>
                  <td>Sabtu</td>
                  <td>08.00 - 12.00</td>
                  <td>Terbatas</td>
                </tr>
                <tr>
                  <td>Minggu</td>
                  <td>-</td>
                  <td>Tutup</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3>Layanan Administrasi</h3>
            <p>
              Pengajuan dokumen and kebutuhan administrasi sebaiknya dilakukan
              pada hari kerja untuk mempercepat proses tindak lanjut.
            </p>
          </div>

          <div class="card info-card">
            <h3>Koordinasi Kegiatan</h3>
            <p>
              Jadwal layanan membantu dosen and mitra menentukan waktu yang tepat
              untuk koordinasi kegiatan penelitian maupun abdimas.
            </p>
          </div>

          <div class="card info-card">
            <h3>Pelayanan Terbatas</h3>
            <p>
              Pada hari Sabtu, layanan dapat bersifat terbatas sesuai kebutuhan
              and kebijakan operasional yang berlaku.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
