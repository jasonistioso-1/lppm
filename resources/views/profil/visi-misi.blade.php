@extends('layouts.app')

@section('title', 'Visi, Misi, Tujuan, dan Sasaran | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('profil/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('profil/visi-misi.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section">
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="badge">Profil · Visi, Misi, Tujuan, dan Sasaran</span>
          <h1>Visi, Misi, Tujuan, dan Sasaran LPPM</h1>
          <p>
            Halaman ini memuat arah pengembangan LPPM Institut Bisnis dan Informatika
            Kwik Kian Gie, meliputi visi dan misi periode 2025–2030, tujuan,
            sasaran, serta arsip visi dan misi periode sebelumnya.
          </p>
          <div class="hero-actions">
            <a href="#visi-baru" class="btn btn-primary">Lihat Visi &amp; Misi</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-panel">
            <div class="hero-panel-head">
              <h3>Ringkasan Dokumen</h3>
            </div>
            <div class="hero-panel-body">
              <div class="mini-stat">
                <strong>2025</strong>
                <span>Periode Baru</span>
              </div>
              <div class="mini-stat">
                <strong>2045</strong>
                <span>Arah Visi</span>
              </div>
              <div class="mini-stat">
                <strong>4</strong>
                <span>Misi Utama</span>
              </div>
              <div class="mini-stat">
                <strong>4</strong>
                <span>Sasaran Strategis</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="visi-baru">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Periode 2025–2030</span>
            <h2>Visi dan Misi LPPM</h2>
          </div>
          <p>
            Visi dan misi terbaru menjadi landasan pengembangan penelitian,
            publikasi, dan pengabdian kepada masyarakat yang inovatif,
            kolaboratif, dan berdaya saing internasional.
          </p>
        </div>

        @if($page)
          <div class="content-stack">
            <div class="card vision-card" style="margin-bottom: 2rem; background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.9));">
              <div class="card-overlay-content" style="padding: 3rem;">
                <h3 style="color: var(--accent-color); font-size: 1.8rem; margin-bottom: 1.5rem;">Visi & Misi Dinamis</h3>
                <div class="highlight" style="font-size: 1.15rem; line-height: 1.8; color: #f1f5f9;">
                  {!! $page->content !!}
                </div>
              </div>
            </div>
          </div>
        @else
          <div class="content-stack">
            <div class="card vision-card">
              <div class="card-overlay-content">
                <h3>Visi LPPM</h3>
                <p class="highlight">
                  “Menjadi Lembaga Penelitian dan Pengabdian Masyarakat yang unggul dan
                  terkemuka dengan mengembangkan proses penelitian, publikasi dan
                  pengabdian kepada masyarakat yang inovatif, kolaboratif dan kreatif
                  di bidang bisnis, informatika, komunikasi yang berorientasi pada
                  entrepreneurship, serta berdaya saing internasional di tahun 2045”
                </p>
              </div>
            </div>

            <div class="card mission-card">
              <div class="card-overlay-content">
                <h3>Misi LPPM</h3>
                <ul class="info-list">
                  <li>
                    Mengembangkan penelitian dan publikasi yang berkualitas di bidang
                    bisnis, informatika, dan komunikasi yang berorientasi pada
                    entrepreneurship dan bermanfaat bagi masyarakat serta berdaya
                    saing internasional.
                  </li>
                  <li>
                    Mengembangkan pengabdian kepada masyarakat yang berkualitas di
                    bidang bisnis, informatika, dan komunikasi yang berorientasi pada
                    entrepreneurship dan bermanfaat bagi masyarakat serta berdaya
                    saing internasional.
                  </li>
                  <li>
                    Melaksanakan tata kelola Lembaga Penelitian dan Pengabdian
                    Masyarakat yang responsif, transparan, akuntabel, mandiri,
                    efektif, dan efisien untuk mendukung penelitian, publikasi dan
                    pengabdian kepada masyarakat yang berkualitas dan berdaya saing
                    internasional.
                  </li>
                  <li>
                    Melaksanakan kolaborasi kerja sama penelitian, publikasi dan
                    pengabdian kepada masyarakat dalam bidang bisnis, informatika, dan
                    komunikasi dengan mitra strategis, yang bermanfaat bagi
                    masyarakat dan berdaya saing internasional.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @endif
      </div>
    </section>

    <section class="section alt-section" id="tujuan-sasaran">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Arah Strategis</span>
            <h2>Tujuan dan Sasaran LPPM</h2>
          </div>
          <p>
            Tujuan dan sasaran ini menjadi indikator arah pelaksanaan program
            lembaga secara berkelanjutan.
          </p>
        </div>

        <div class="content-stack">
          <div class="grid-2">
            <div class="card goal-card">
              <div class="card-overlay-content">
                <h3>Tujuan LPPM</h3>
                <ul class="info-list">
                  <li>
                    Menghasilkan penelitian dan publikasi yang berkualitas di
                    bidang bisnis, informatika, dan komunikasi yang berorientasi
                    pada entrepreneurship dan bermanfaat bagi masyarakat serta
                    berdaya saing internasional.
                  </li>
                  <li>
                    Menghasilkan pengabdian kepada masyarakat yang berkualitas di
                    bidang bisnis, informatika, dan komunikasi yang berorientasi
                    pada entrepreneurship dan bermanfaat bagi masyarakat serta
                    berdaya saing internasional.
                  </li>
                  <li>
                    Menghasilkan tata kelola Lembaga Penelitian dan Pengabdian
                    Masyarakat yang responsif, transparan, akuntabel, mandiri,
                    efektif, dan efisien untuk mendukung penelitian, publikasi dan
                    pengabdian kepada masyarakat yang berkualitas dan berdaya saing
                    internasional.
                  </li>
                  <li>
                    Menghasilkan kolaborasi kerja sama penelitian, publikasi dan
                    pengabdian kepada masyarakat dalam bidang bisnis, informatika,
                    dan komunikasi dengan mitra strategis, yang bermanfaat bagi
                    masyarakat dan berdaya saing internasional.
                  </li>
                </ul>
              </div>
            </div>

            <div class="card target-card">
              <div class="card-overlay-content">
                <h3>Sasaran LPPM</h3>
                <ul class="info-list">
                  <li>
                    Meningkatnya penelitian dan publikasi yang berkualitas di
                    bidang bisnis, informatika, dan komunikasi yang berorientasi
                    pada entrepreneurship dan bermanfaat bagi masyarakat serta
                    berdaya saing internasional.
                  </li>
                  <li>
                    Meningkatnya pengabdian kepada masyarakat yang berkualitas di
                    bidang bisnis, informatika, dan komunikasi yang berorientasi
                    pada entrepreneurship dan bermanfaat bagi masyarakat serta
                    berdaya saing internasional.
                  </li>
                  <li>
                    Meningkatnya kualitas tata kelola Lembaga Penelitian dan
                    Pengabdian Masyarakat yang responsif, transparan, akuntabel,
                    mandiri, efektif, dan efisien untuk mendukung penelitian,
                    publikasi dan pengabdian kepada masyarakat yang berkualitas dan
                    berdaya saing internasional.
                  </li>
                  <li>
                    Meningkatnya kolaborasi kerja sama penelitian, publikasi dan
                    pengabdian kepada masyarakat dalam bidang bisnis, informatika,
                    dan komunikasi dengan mitra strategis, yang bermanfaat bagi
                    masyarakat dan berdaya saing internasional.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="visi-lama">
      <div class="container">
        <div class="section-head">
          <div>
            <span class="section-tag">Arsip Dokumen</span>
            <h2>Visi dan Misi LPPM Periode 2020–2025</h2>
          </div>
          <p>
            Bagian ini disimpan sebagai referensi arah kelembagaan pada periode sebelumnya.
          </p>
        </div>

        <div class="content-stack">
          <div class="card old">
            <h3>Visi LPPM 2020–2025</h3>
            <p class="highlight">
              “Menjadi lembaga penelitian dan pengabdian kepada masyarakat (LPPM)
              yang terkemuka dengan tata kelola, profesionalisme, dan
              kepemimpinan yang tinggi di bidang penelitian dan pengabdian kepada
              masyarakat serta selalu tanggap terhadap kebutuhan ilmu pengetahuan
              dan teknologi bagi masyarakat dan dunia bisnis”
            </p>
          </div>

          <div class="grid-2">
            <div class="card old">
              <h3>Misi LPPM 2020–2025</h3>
              <h4>A. Bidang Penelitian</h4>
              <ol class="info-list">
                <li>Meningkatkan kemampuan dosen dalam melakukan penelitian dasar dan terapan.</li>
                <li>Mendorong peningkatan penelitian dosen dan mempublikasikannya.</li>
                <li>Mendorong penelitian dosen yang dapat meningkatkan kesejahteraan masyarakat.</li>
                <li>Mendorong penelitian dosen untuk pengembangan ilmu pengetahuan dan teknologi.</li>
                <li>Mendorong penelitian dosen yang inovatif serta mendukung pelaksanaan, pelaporan dan publikasi penelitian dosen.</li>
              </ol>
            </div>

            <div class="card old">
              <h3>&nbsp;</h3>
              <h4>B. Bidang Pengabdian kepada Masyarakat</h4>
              <ol class="info-list">
                <li>
                  Berperan serta dalam meningkatkan kemampuan masyarakat dan
                  pelaku usaha kecil, menengah dan koperasi.
                </li>
                <li>
                  Meningkatkan peran Learning Center dalam pendidikan, pelatihan
                  dan penelitian agar sesuai dengan kebutuhan masyarakat,
                  khususnya bagi pelaku bisnis usaha kecil, menengah dan koperasi.
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
