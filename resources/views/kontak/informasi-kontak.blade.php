@extends('layouts.app')

@section('title', 'Informasi Kontak | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('kontak/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('kontak/informasi-kontak.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
        <div class="container hero-grid">
          <div class="hero-copy">
            <span class="badge">Kontak · Informasi</span>
            <h1>Informasi Kontak LPPM</h1>
            <p>
              Halaman ini memuat informasi dasar layanan LPPM, termasuk alamat,
              email, dan nomor kontak yang dapat dihubungi.
            </p>
            <div class="hero-actions">
              <a href="#kontak-utama" class="btn btn-primary"
                >Lihat Informasi</a
              >
              <a href="{{ route('home') }}" class="btn btn-outline"
                >Kembali ke Beranda</a
              >
            </div>
          </div>

          <div class="hero-visual">
            <div class="hero-panel">
              <div class="hero-panel-head">
                <h3>Ringkasan Kontak</h3>
              </div>
              <div class="hero-panel-body">
                <div class="mini-stat">
                  <strong>1</strong>
                  <span>Alamat Utama</span>
                </div>
                <div class="mini-stat">
                  <strong>Email</strong>
                  <span>Layanan Resmi</span>
                </div>
                <div class="mini-stat">
                  <strong>Telepon</strong>
                  <span>Kontak Admin</span>
                </div>
                <div class="mini-stat">
                  <strong>LPPM</strong>
                  <span>Pusat Layanan</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="kontak-utama">
        <div class="container">
          <div class="section-head">
            <div>
              <span class="section-tag">Informasi Kontak</span>
              <h2>Detail Layanan yang Dapat Dihubungi</h2>
            </div>
            <p>
              Gunakan informasi berikut untuk kebutuhan komunikasi, konsultasi,
              dan koordinasi administrasi bersama LPPM.
            </p>
          </div>

          <div class="grid-2 contact-grid">
            <div class="card">
              <div class="contact-list">
                <div class="contact-row">
                  <span>Alamat</span>
                  <strong>{{ $contact->address ?? 'Jl. Yos Sudarso Kav 85 No.87, Sunter Jaya, Jakarta Utara' }}</strong>
                </div>
                <div class="contact-row">
                  <span>Email</span>
                  <strong>{{ $contact->email ?? 'lppm@kwikkiangie.ac.id' }}</strong>
                </div>
                <div class="contact-row">
                  <span>Telepon</span>
                  <strong>{{ $contact->phone ?? '+62 21 6530 7062' }}</strong>
                </div>
              </div>
            </div>

            <div class="card">
              <h3>Keterangan</h3>
              <p>
                Informasi kontak ini dapat digunakan untuk kebutuhan
                surat-menyurat, konfirmasi kegiatan, pengajuan dokumen, dan
                komunikasi resmi lainnya.
              </p>
              <p>
                Untuk kebutuhan layanan spesifik seperti jadwal operasional atau
                lokasi kampus, silakan lihat submenu terkait pada bagian kontak.
              </p>
            </div>
          </div>
        </div>
      </section>
@endsection
