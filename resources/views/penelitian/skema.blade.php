@extends('layouts.app')

@section('title', 'Skema Penelitian | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('penelitian/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('penelitian/skema.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Penelitian · Skema</span>
          <h1>Skema Penelitian LPPM</h1>
          <p>
            Halaman ini memuat daftar skema penelitian yang dapat dipilih dosen
            sesuai kebutuhan, target luaran, dan karakteristik program penelitian.
          </p>
          <div class="hero-actions">
            <a href="#daftar-skema" class="btn btn-primary">Lihat Skema</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Skema</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>3</strong>
                <span>Skema Utama</span>
              </div>
              <div class="mini-stat">
                <strong>1–2</strong>
                <span>Tahun Durasi</span>
              </div>
              <div class="mini-stat">
                <strong>Aktif</strong>
                <span>Status Dominan</span>
              </div>
              <div class="mini-stat">
                <strong>Dosen</strong>
                <span>Target Utama</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section skema-section" id="daftar-skema">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Skema Penelitian</span>
            <h2>Pilihan Program Penelitian</h2>
          </div>
          <p>
            Skema berikut disusun untuk menyesuaikan fokus kajian, target luaran,
            dan model kolaborasi penelitian.
          </p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Skema</th>
                  <th>Target</th>
                  <th>Durasi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Penelitian Dasar</td>
                  <td>Dosen Tetap</td>
                  <td>1 Tahun</td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Penelitian Terapan</td>
                  <td>Dosen &amp; Tim</td>
                  <td>1 Tahun</td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Penelitian Kolaboratif</td>
                  <td>Lintas Prodi</td>
                  <td>1–2 Tahun</td>
                  <td>Draft</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 skema-info-grid">
          <div class="card info-card">
            <h3>Penelitian Dasar</h3>
            <p>
              Skema ini ditujukan untuk pengembangan konsep, model, atau kajian
              teoritis yang memperkuat landasan keilmuan di bidang terkait.
            </p>
          </div>

          <div class="card info-card">
            <h3>Penelitian Terapan</h3>
            <p>
              Skema ini berfokus pada penyelesaian masalah nyata melalui penerapan
              metode, model, atau teknologi yang relevan dengan kebutuhan lapangan.
            </p>
          </div>

          <div class="card info-card">
            <h3>Penelitian Kolaboratif</h3>
            <p>
              Skema ini mendorong kerja sama lintas program studi atau mitra
              eksternal untuk menghasilkan luaran yang lebih luas dan berdampak.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
