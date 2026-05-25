@extends('layouts.app')

@section('title', 'Skema Abdimas | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('abdimas/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('abdimas/skema.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Abdimas · Skema</span>
          <h1>Skema Program Abdimas</h1>
          <p>
            Halaman ini memuat pilihan skema pengabdian kepada masyarakat yang
            dapat disesuaikan dengan target mitra, durasi, dan bentuk luaran.
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
                <strong>6–12</strong>
                <span>Bulan Durasi</span>
              </div>
              <div class="mini-stat">
                <strong>Aktif</strong>
                <span>Status Dominan</span>
              </div>
              <div class="mini-stat">
                <strong>Mitra</strong>
                <span>Target Program</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-skema">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Skema Abdimas</span>
            <h2>Pilihan Program Pengabdian</h2>
          </div>
          <p>
            Skema abdimas disusun untuk mendukung kebutuhan masyarakat, mitra,
            dan pencapaian luaran pengabdian secara terukur.
          </p>
        </div>

        <div class="table-card">
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Skema</th>
                  <th>Sasaran</th>
                  <th>Durasi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Pelatihan UMKM</td>
                  <td>Masyarakat Umum</td>
                  <td>6 Bulan</td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Pendampingan Sekolah</td>
                  <td>Sekolah Mitra</td>
                  <td>1 Tahun</td>
                  <td>Aktif</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Literasi Digital</td>
                  <td>Komunitas</td>
                  <td>6 Bulan</td>
                  <td>Draft</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="grid-3 info-grid">
          <div class="card info-card">
            <h3>Pelatihan UMKM</h3>
            <p>
              Fokus pada peningkatan kapasitas pelaku usaha melalui pelatihan
              manajemen, pemasaran, keuangan, dan digitalisasi usaha.
            </p>
          </div>

          <div class="card info-card">
            <h3>Pendampingan Sekolah</h3>
            <p>
              Ditujukan untuk mendukung mitra sekolah melalui pelatihan,
              penguatan administrasi, literasi, dan pengembangan program pendidikan.
            </p>
          </div>

          <div class="card info-card">
            <h3>Literasi Digital</h3>
            <p>
              Mendorong pemanfaatan teknologi digital secara tepat guna bagi
              komunitas, organisasi, atau kelompok masyarakat sasaran.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection
