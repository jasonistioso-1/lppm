<header class="topbar">
  <div class="container topbar-inner">
    <div class="topbar-left">
      <span>Lembaga Penelitian dan Pengabdian kepada Masyarakat</span>
    </div>
    <div class="topbar-right">
      <span>Institut Bisnis dan Informatika Kwik Kian Gie</span>
    </div>
  </div>
</header>

<header class="site-header" id="navbarWrap">
  <div class="container header-container">
    <a href="{{ route('home') }}" class="header-logo" aria-label="Beranda LPPM IBI KKG">
      <img src="{{ asset('assets/logo_ibinew_biru.png') }}" alt="Logo IBI KKG" />
    </a>

    <nav class="header-nav" id="navMenu" aria-label="Navigasi utama">
      <div class="nav-item no-dropdown">
        <a href="{{ route('home') }}" class="nav-link">BERANDA</a>
      </div>

      <div class="nav-item">
        <a href="{{ route('profil.tentang') }}" class="nav-link">PROFIL</a>
        <div class="nav-dropdown">
          <a href="{{ route('profil.tentang') }}" class="submenu-item">Tentang Kami</a>
          <a href="{{ route('profil.visi') }}" class="submenu-item">Visi &amp; Misi</a>
          <a href="{{ route('profil.struktur') }}" class="submenu-item">Struktur Organisasi</a>
          <a href="{{ route('profil.prestasi') }}" class="submenu-item">Prestasi</a>
        </div>
      </div>

      <div class="nav-item">
        <a href="{{ route('dosen.ilmuadministrasibisnis') }}" class="nav-link">AKADEMISI</a>
        <div class="nav-dropdown">
          <a href="{{ route('dosen.ilmuadministrasibisnis') }}" class="submenu-item">Ilmu Administrasi Bisnis</a>
          <a href="{{ route('dosen.akuntansi') }}" class="submenu-item">Akuntansi</a>
          <a href="{{ route('dosen.manajemen') }}" class="submenu-item">Manajemen</a>
          <a href="{{ route('dosen.ilmukomunikasi') }}" class="submenu-item">Ilmu Komunikasi</a>
          <a href="{{ route('dosen.sisteminf') }}" class="submenu-item">Sistem Informasi</a>
          <a href="{{ route('dosen.teknikinf') }}" class="submenu-item">Teknik Informatika</a>
        </div>
      </div>

      <div class="nav-item">
        <a href="{{ route('penelitian.pengumuman') }}" class="nav-link">PENELITIAN</a>
        <div class="nav-dropdown">
          <a href="{{ route('penelitian.pengumuman') }}" class="submenu-item">Pengumuman</a>
          <a href="{{ route('penelitian.skema') }}" class="submenu-item">Skema</a>
          <a href="{{ route('penelitian.data') }}" class="submenu-item">Data Penelitian</a>
        </div>
      </div>

      <div class="nav-item">
        <a href="{{ route('abdimas.pengumuman') }}" class="nav-link">ABDIMAS</a>
        <div class="nav-dropdown">
          <a href="{{ route('abdimas.pengumuman') }}" class="submenu-item">Pengumuman</a>
          <a href="{{ route('abdimas.skema') }}" class="submenu-item">Skema</a>
          <a href="{{ route('abdimas.data') }}" class="submenu-item">Data Abdimas</a>
        </div>
      </div>

      <div class="nav-item">
        <a href="{{ route('publikasi.jurnal') }}" class="nav-link">PUBLIKASI</a>
        <div class="nav-dropdown">
          <a href="{{ route('publikasi.jurnal') }}" class="submenu-item">Jurnal</a>
          <a href="{{ route('publikasi.prosiding') }}" class="submenu-item">Prosiding</a>
          <a href="{{ route('publikasi.artikel') }}" class="submenu-item">Artikel Ilmiah</a>
        </div>
      </div>

      <div class="nav-item no-dropdown">
        <a
          href="https://linktr.ee/lppmkkg?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAb21jcARV2mBleHRuA2FlbQIxMQBzcnRjBmFwcF9pZA81NjcwNjczNDMzNTI0MjcAAafTUkyVZTPIEdYv3YA75ggeg88EUVuc7PPWR_iW7NUnzA2H2WRV_vXbLpHn3g_aem_SeaeWPaf6-dTQwW8Hb-ZuQ"
          target="_blank"
          rel="noopener noreferrer"
          class="nav-link"
        >
          SUBMIT
        </a>
      </div>

      <div class="nav-item">
        <a href="{{ route('dokumen.panduan') }}" class="nav-link">DOKUMEN</a>
        <div class="nav-dropdown">
          <a href="{{ route('dokumen.panduan') }}" class="submenu-item">Panduan</a>
          <a href="{{ route('dokumen.template') }}" class="submenu-item">Template</a>
          <a href="{{ route('dokumen.unduhan') }}" class="submenu-item">Unduhan</a>
        </div>
      </div>

      <div class="nav-item">
        <a href="{{ route('kontak.informasi') }}" class="nav-link">KONTAK</a>
        <div class="nav-dropdown">
          <a href="{{ route('kontak.informasi') }}" class="submenu-item">Informasi</a>
          <a href="{{ route('kontak.jam') }}" class="submenu-item">Jam Layanan</a>
          <a href="{{ route('kontak.lokasi') }}" class="submenu-item">Lokasi</a>
        </div>
      </div>
    </nav>

    <button class="menu-toggle" id="menuToggle" aria-label="Buka menu navigasi">
      ☰
    </button>
  </div>
</header>
