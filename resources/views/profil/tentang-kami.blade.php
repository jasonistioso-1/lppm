@extends('layouts.app')

@section('title', 'Tentang Kami | LPPM IBI KKG')

@section('page-css')
  <link rel="stylesheet" href="{{ asset('profil/fonts.gstatic.com') }}" />
  <link rel="stylesheet" href="{{ asset('profil/tentang-kami.css') }}" />
@endsection

@section('page-js')
@endsection

@section('content')
<section class="hero section tentang-hero">
      <div class="container hero-grid">
        <div class="hero-copy reveal">
          <div class="hero-topbar">
            <span class="badge hero-badge">Profil · Tentang Kami</span>
          </div>
          <h1 class="hero-main-title">
            <span class="hero-title-line">Tentang</span>
            <span class="hero-title-line hero-title-line-accent">LPPM IBI KKG</span>
          </h1>
          <p class="hero-main-desc">
            Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) merupakan unit strategis yang mengelola, mengembangkan, dan mendukung penuh pelaksanaan riset ilmiah, pengabdian masyarakat, publikasi ilmiah, serta penguatan jejaring kerja sama tridharma.
          </p>
          <div class="hero-actions">
            <a href="#tentang-lppm" class="btn btn-primary">Pelajari Lebih Lanjut</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Kembali ke Beranda</a>
          </div>
        </div>

        <div class="hero-visual reveal">
          <div class="glass-panel summary-panel">
            <div class="summary-header">
              <div class="summary-icon-box">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <div class="summary-titles">
                <h3>Sekilas LPPM</h3>
                <p>Metrik & Kinerja Aktivitas</p>
              </div>
            </div>
            
            <div class="summary-stats-grid">
              <div class="glass-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-cubes"></i></div>
                <div class="stat-number">3</div>
                <div class="stat-label">Pilar Utama</div>
              </div>
              
              <div class="glass-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <div class="stat-number">100+</div>
                <div class="stat-label">Publikasi Aktif</div>
              </div>
              
              <div class="glass-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-award"></i></div>
                <div class="stat-number">Unggul</div>
                <div class="stat-label">Standar Mutu</div>
              </div>
              
              <div class="glass-stat-card">
                <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
                <div class="stat-number">100%</div>
                <div class="stat-label">Dukungan Dosen</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="tentang-lppm">
      <div class="container">
        <div class="section-head-center reveal">
          <div>
            <span class="section-tag">Profil Lembaga</span>
            <h2>Peran dan Fungsi LPPM</h2>
            <p>
              LPPM hadir sebagai pusat orkestrasi tridharma perguruan tinggi, menghubungkan potensi keilmuan akademisi dengan kebutuhan nyata masyarakat dan industri secara berkelanjutan.
            </p>
          </div>
        </div>

        <div class="content-stack">
          <!-- Profil Singkat Card with Glowing Accent -->
          <div class="card card-glow-accent reveal">
            <div class="card-icon-header">
              <div class="icon-circle"><i class="fa-solid fa-circle-info"></i></div>
              <h3>Profil Singkat</h3>
            </div>
            <div class="card-body-text">
              @if($page)
                {!! $page->content !!}
              @else
                <p>
                  LPPM IBI KKG bertugas mengelola proses administratif, akademik, dan strategis dalam pelaksanaan penelitian dosen, pengabdian kepada masyarakat, publikasi ilmiah, serta pengembangan kolaborasi dengan mitra internal maupun eksternal.
                </p>
                <p>
                  Melalui pengelolaan yang profesional, transparan, dan berbasis teknologi informasi, LPPM berkomitmen memfasilitasi sivitas akademika guna melahirkan karya riset inovatif dan program pengabdian yang memberikan kontribusi nyata bagi masyarakat luas.
                </p>
              @endif
            </div>
          </div>

          <!-- Tugas & Fungsi Grid -->
          <div class="grid-2">
            <div class="card card-premium-list card-blue reveal">
              <div class="card-icon-header">
                <div class="icon-circle"><i class="fa-solid fa-list-check"></i></div>
                <h3>Tugas Utama</h3>
              </div>
              <ul class="premium-check-list">
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Mengelola administrasi dan pendanaan internal/eksternal penelitian dosen.</span>
                </li>
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Mengoordinasikan dan merancang agenda pengabdian kepada masyarakat (Abdimas).</span>
                </li>
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Mendorong luaran ilmiah bermutu tinggi melalui pembinaan berkelanjutan.</span>
                </li>
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Menyediakan standarisasi panduan, dokumen administrasi, serta template resmi.</span>
                </li>
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Membangun kerja sama strategis multi-sektoral dengan industri, pemerintah, dan LSM.</span>
                </li>
              </ul>
            </div>

            <div class="card card-premium-list card-gold reveal">
              <div class="card-icon-header">
                <div class="icon-circle"><i class="fa-solid fa-compass"></i></div>
                <h3>Fungsi Strategis</h3>
              </div>
              <ul class="premium-check-list">
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Sebagai katalisator utama pengembangan iklim riset institusi.</span>
                </li>
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Sebagai jembatan hilirisasi karya keilmuan dosen ke masyarakat.</span>
                </li>
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Sebagai fasilitator peningkatan sitasi dan indeks publikasi ilmiah global.</span>
                </li>
                <li>
                  <span class="check-icon"><i class="fa-solid fa-circle-check"></i></span>
                  <span class="list-text">Sebagai penyedia platform terintegrasi untuk seluruh layanan tridharma.</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Ruang Lingkup Layanan (3 Pillars) -->
          <div class="card card-pillars reveal">
            <div class="card-icon-header">
              <div class="icon-circle"><i class="fa-solid fa-handshake-angle"></i></div>
              <h3>Ruang Lingkup Layanan</h3>
            </div>
            <div class="grid-3 pillar-cards-grid">
              <div class="pillar-card hover-glow reveal-delay-1">
                <div class="pillar-header">
                  <div class="pillar-icon"><i class="fa-solid fa-microscope"></i></div>
                  <h4>Penelitian</h4>
                </div>
                <p>Mengelola pengajuan proposal hibah, proses monitoring evaluasi berkala, pelaporan keuangan, hingga pendampingan paten dan HKI hasil riset dosen.</p>
                <div class="pillar-footer">
                  <a href="{{ route('penelitian.pengumuman') }}" class="pillar-link">Lihat Layanan <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
              </div>

              <div class="pillar-card hover-glow reveal-delay-2">
                <div class="pillar-header">
                  <div class="pillar-icon"><i class="fa-solid fa-users-line"></i></div>
                  <h4>Abdimas</h4>
                </div>
                <p>Menyelenggarakan kegiatan pengabdian masyarakat berorientasi dampak, memandu program binaan desa mitra, serta mengoordinasikan laporan pengabdian.</p>
                <div class="pillar-footer">
                  <a href="{{ route('abdimas.pengumuman') }}" class="pillar-link">Lihat Layanan <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
              </div>

              <div class="pillar-card hover-glow reveal-delay-3">
                <div class="pillar-header">
                  <div class="pillar-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                  <h4>Publikasi &amp; Jurnal</h4>
                </div>
                <p>Dukungan penyuntingan artikel ilmiah, penyediaan direktori jurnal bereputasi nasional dan internasional, serta pengurusan insentif publikasi.</p>
                <div class="pillar-footer">
                  <a href="{{ route('publikasi.jurnal') }}" class="pillar-link">Lihat Layanan <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Nilai Inti (Core Values) Grid - New Aesthetic Feature! -->
          <div class="card card-values reveal">
            <div class="card-icon-header">
              <div class="icon-circle"><i class="fa-solid fa-gem"></i></div>
              <h3>Nilai Utama Layanan (Core Values)</h3>
            </div>
            <div class="values-grid">
              <div class="value-item">
                <div class="value-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                <h5>Tertib</h5>
                <p>Tata kelola administrasi yang rapi, transparan, terdokumentasi, dan sesuai dengan standar nasional DIKTI.</p>
              </div>
              <div class="value-item">
                <div class="value-icon"><i class="fa-solid fa-eye"></i></div>
                <h5>Transparan</h5>
                <p>Keterbukaan informasi terkait skema dana hibah riset, penilaian proposal, hasil monev, hingga pembagian insentif.</p>
              </div>
              <div class="value-item">
                <div class="value-icon"><i class="fa-solid fa-sliders"></i></div>
                <h5>Adaptif</h5>
                <p>Terus berinovasi dan menyesuaikan layanan dengan kebutuhan digitalisasi tridharma perguruan tinggi.</p>
              </div>
              <div class="value-item">
                <div class="value-icon"><i class="fa-solid fa-star"></i></div>
                <h5>Berkualitas</h5>
                <p>Memprioritaskan mutu hasil luaran yang berdaya saing nasional serta berorientasi dampak global.</p>
              </div>
            </div>
          </div>

          <!-- Komitmen LPPM -->
          <div class="card card-commitment reveal">
            <div class="commitment-content">
              <div class="commitment-badge">Komitmen Kami</div>
              <h3>Pemberdayaan Berkelanjutan & Dampak Nyata</h3>
              <p>
                LPPM IBI KKG berkomitmen untuk secara konsisten memberikan pelayanan prima yang adaptif dan berorientasi kualitas. Melalui sinergi riset akademis dan program pengabdian inovatif, kami bertekad mempercepat pertumbuhan keilmuan civitas akademika dan mewujudkan kolaborasi bernilai tambah tinggi bagi masyarakat dan mitra strategis.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
