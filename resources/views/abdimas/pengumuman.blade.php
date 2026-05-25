@extends('layouts.app')

@section('title', 'Pengumuman Abdimas | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('abdimas/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('abdimas/pengumuman.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Abdimas · Pengumuman</span>
          <h1>Pengumuman Program Abdimas</h1>
          <p>
            Halaman ini berisi informasi terbaru terkait pengajuan, pelaksanaan,
            monitoring, dan evaluasi kegiatan pengabdian kepada masyarakat.
          </p>
          <div class="hero-actions">
            <a href="#daftar-pengumuman" class="btn btn-primary">Lihat Pengumuman</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Informasi</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>{{ $announcements->count() }}</strong>
                <span>Pengumuman Aktif</span>
              </div>
              <div class="mini-stat">
                <strong>{{ date('Y') }}</strong>
                <span>Periode Berjalan</span>
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

    <section class="section" id="daftar-pengumuman">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Pengumuman Abdimas</span>
            <h2>Informasi Terbaru Kegiatan Abdimas</h2>
          </div>
          <p>
            Pantau halaman ini untuk mengetahui pembaruan jadwal, skema,
            monitoring, dan ketentuan kegiatan pengabdian kepada masyarakat.
          </p>
        </div>

        <div class="content-stack">
          @forelse($announcements as $announcement)
            <article class="card">
              <div class="announcement-item">
                <strong>{{ $announcement->title }}</strong>
                <span class="badge" style="background: rgba(16, 185, 129, 0.08); color: #059669; padding: 4px 8px; border-radius: 6px; font-size: 0.8rem; font-weight: 600;">Aktif</span>
              </div>
              <div style="margin-top: 1rem; color: var(--text-muted); line-height: 1.8;">
                {!! $announcement->content !!}
              </div>
              @if($announcement->published_at)
                <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 1rem;"><i class="fa-regular fa-calendar" style="margin-right: 5px;"></i> Dipublikasikan pada: {{ \Carbon\Carbon::parse($announcement->published_at)->format('d F Y') }}</p>
              @endif
            </article>
          @empty
            <p style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada pengumuman terbaru saat ini.</p>
          @endforelse
        </div>
      </div>
    </section>
@endsection
