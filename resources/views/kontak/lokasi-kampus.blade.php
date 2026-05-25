@extends('layouts.app')

@section('title', 'Lokasi Kampus | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('kontak/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('kontak/lokasi-kampus.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Kontak · Lokasi Kampus</span>
          <h1>Lokasi Kampus dan LPPM</h1>
          <p>
            Halaman ini memuat lokasi kampus untuk memudahkan akses kunjungan,
            koordinasi, maupun kegiatan yang berkaitan dengan layanan LPPM.
          </p>
          <div class="hero-actions">
            <a href="#lokasi-kampus" class="btn btn-primary">Lihat Lokasi</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Lokasi</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>Jakarta</strong>
                <span>Kota</span>
              </div>
              <div class="mini-stat">
                <strong>Sunter</strong>
                <span>Area</span>
              </div>
              <div class="mini-stat">
                <strong>IBI KKG</strong>
                <span>Kampus</span>
              </div>
              <div class="mini-stat">
                <strong>Map</strong>
                <span>Tersedia</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="lokasi-kampus">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Lokasi Kampus</span>
            <h2>Alamat dan Peta Lokasi</h2>
          </div>
          <p>
            Gunakan peta berikut untuk menemukan lokasi kampus dan mendukung
            kebutuhan kunjungan atau kegiatan lapangan.
          </p>
        </div>

        <div class="grid-2 lokasi-grid">
          <div class="card">
            <h3>Alamat Lengkap</h3>
            <div class="contact-list">
              <div class="contact-row">
                <span>Institusi</span>
                <strong>Institut Bisnis dan Informatika Kwik Kian Gie</strong>
              </div>
              <div class="contact-row">
                <span>Alamat</span>
                <strong>{{ $contact->address ?? 'Jl. Yos Sudarso Kav 85 No.87, Sunter Jaya, Jakarta Utara' }}</strong>
              </div>
              <div class="contact-row">
                <span>Keterangan</span>
                <strong>Lokasi layanan LPPM berada dalam lingkungan kampus</strong>
              </div>
            </div>
          </div>

          <div class="card">
            <h3>Peta Lokasi</h3>
            <iframe
              id="contactMap"
              class="map-frame"
              src="{{ $contact->map_iframe ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.866085527181!2d106.89069177573981!3d-6.148679960269384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5466c0d7009%3A0x6b4430f81d11ff!2sInstitut%20Bisnis%20dan%20Informatika%20Kwik%20Kian%20Gie!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid' }}"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              title="Peta Lokasi Kampus"
              style="width: 100%; height: 350px; border: 0; border-radius: 8px;"
            ></iframe>
            <div class="location-status" id="contactLocationStatus">
              Map: Kwik Kian Gie School of Business
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
