@extends('layouts.app')

@section('title', 'Dosen Ilmu Administrasi Bisnis | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('dosen/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('dosen/dosen.css') }}" />
@endsection

@section('page-js')
  <script>const DOSEN_DATA = @json($dosens);</script>
  <script src="{{ asset('dosen/dosen.js') }}"></script>
@endsection

@section('content')
<section class="hero section dosen-hero">
      <div class="container dosen-hero-grid">
        <div class="hero-copy">
          <span class="badge">Akademisi · Ilmu Administrasi Bisnis</span>
          <h1>Ilmu Administrasi Bisnis</h1>

          <div class="hero-actions">
            <a href="#daftar-dosen" class="btn btn-primary">Lihat Akademisi</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel dosen-hero-panel program-profile-card">
            <div class="program-certificate-wrap">
              <img
                src="{{ asset('assets/images/dosen/akre_adbis.jpg') }}"
                alt="Sertifikat Profil Program Ilmu Administrasi Bisnis"
                class="program-certificate-img"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="daftar-dosen">
      <div class="container">
        <div class="section-head section-head-center">
          <span class="section-tag">Daftar Akademisi</span>
        </div>

        <div class="dosen-grid">
        </div>
      </div>
    </section>
@endsection
