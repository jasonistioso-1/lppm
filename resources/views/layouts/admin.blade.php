<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard LPPM') | IBI Kwik Kian Gie</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #050b1a;
            --bg-sidebar: #0f1c3f;
            --accent-primary: #0072ff;
            --accent-secondary: #00c6ff;
            --border-light: rgba(255, 255, 255, 0.08);
            --kkg-blue: #0f2b5c;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-dark);
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 290px;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            z-index: 100;
            transition: all 0.3s ease;
            height: 100vh;
            position: sticky;
            top: 0;
        }

        .sidebar-brand {
            padding: 24px;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand img {
            max-height: 40px;
            filter: drop-shadow(0 0 10px rgba(0, 198, 255, 0.2));
        }

        .sidebar-brand h5 {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0;
            background: linear-gradient(135deg, #ffffff 0%, rgba(255, 255, 255, 0.7) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-menu-wrapper {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px 12px;
        }

        /* Scrollbar Styling */
        .sidebar-menu-wrapper::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar-menu-wrapper::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.01);
        }
        .sidebar-menu-wrapper::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-title {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.3);
            margin: 20px 0 8px 16px;
        }

        .sidebar-item {
            margin-bottom: 4px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255, 255, 255, 0.65);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.92rem;
            transition: all 0.25s ease;
            cursor: pointer;
            border: 1px solid transparent;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.04);
        }

        .sidebar-item.active > .sidebar-link {
            background: linear-gradient(135deg, rgba(0, 114, 255, 0.15) 0%, rgba(0, 198, 255, 0.15) 100%);
            border: 1px solid rgba(0, 198, 255, 0.15);
            color: var(--accent-secondary);
            font-weight: 600;
        }

        /* Submenu Styling */
        .sidebar-submenu {
            list-style: none;
            padding-left: 36px;
            margin: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0, 1, 0, 1);
        }

        .sidebar-item.open .sidebar-submenu {
            max-height: 500px;
            transition: max-height 0.3s ease-in-out;
            padding-top: 4px;
            padding-bottom: 8px;
        }

        .sidebar-submenu li {
            margin-bottom: 2px;
        }

        .sidebar-submenu a {
            display: block;
            padding: 8px 12px;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .sidebar-submenu a:hover, .sidebar-submenu li.active a {
            color: var(--accent-secondary);
            background: rgba(255, 255, 255, 0.03);
            padding-left: 16px;
        }

        .arrow-icon {
            font-size: 0.7rem;
            transition: transform 0.3s ease;
            color: rgba(255,255,255,0.4);
        }

        .sidebar-item.open .arrow-icon {
            transform: rotate(180deg);
            color: var(--accent-secondary);
        }

        /* Main Content Styling */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .top-navbar {
            height: 75px;
            background: rgba(15, 28, 63, 0.4);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .top-navbar h4 {
            font-weight: 700;
            font-size: 1.25rem;
            margin: 0;
            background: linear-gradient(135deg, #ffffff 0%, rgba(255, 255, 255, 0.85) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-profile i {
            font-size: 1.6rem;
            color: var(--accent-secondary);
            background: rgba(0, 198, 255, 0.1);
            padding: 8px;
            border-radius: 50%;
        }

        .content-body {
            padding: 40px;
            flex-grow: 1;
        }

        /* Premium Dashboard Components */
        .glass-card {
            background: rgba(15, 28, 63, 0.4) !important;
            backdrop-filter: blur(15px);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .glass-card:hover {
            border-color: rgba(0, 198, 255, 0.25);
        }

        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-light);
            color: #ffffff;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.92rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.07);
            border-color: var(--accent-secondary);
            box-shadow: 0 0 15px rgba(0, 198, 255, 0.2);
            color: #ffffff;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.85);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            border: none;
            font-weight: 600;
            padding: 11px 24px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 114, 255, 0.25);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 198, 255, 0.45);
            background: linear-gradient(135deg, var(--accent-secondary) 0%, var(--accent-primary) 100%);
        }

        .btn-outline-light {
            border: 1px solid var(--border-light);
            background: rgba(255,255,255,0.02);
            font-weight: 600;
            padding: 11px 24px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background: rgba(255,255,255,0.06);
            border-color: rgba(255,255,255,0.25);
            transform: translateY(-1px);
        }

        .table-premium {
            --bs-table-bg: transparent !important;
            --bs-table-hover-bg: rgba(255, 255, 255, 0.03) !important;
            color: #ffffff !important;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
            background: transparent !important;
        }

        .table-premium th {
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6) !important;
            border-bottom: 1px solid var(--border-light) !important;
            padding: 16px 20px;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: rgba(15, 28, 63, 0.6) !important;
        }

        .table-premium td {
            border-bottom: 1px solid var(--border-light) !important;
            padding: 18px 20px;
            vertical-align: middle;
            font-size: 0.92rem;
            color: #ffffff !important;
            background: transparent !important;
        }

        .table-premium tr:hover td {
            background: rgba(255, 255, 255, 0.03) !important;
        }

        .pagination {
            margin-top: 25px;
            gap: 5px;
        }

        .page-link {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border-light);
            color: rgba(255,255,255,0.7);
            border-radius: 8px !important;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: rgba(255, 255, 255, 0.07);
            color: var(--accent-secondary);
            border-color: rgba(0,198,255,0.3);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            border-color: transparent;
            color: #ffffff;
            font-weight: 600;
        }

        .page-item.disabled .page-link {
            background: rgba(255,255,255,0.005);
            border-color: var(--border-light);
            color: rgba(255,255,255,0.2);
        }

        .alert-premium-success {
            background: rgba(40, 167, 69, 0.08);
            border: 1px solid rgba(40, 167, 69, 0.2);
            color: #2ec866;
            border-radius: 12px;
            padding: 16px 20px;
            font-weight: 500;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    @php
        $isBerandaActive = Request::routeIs('admin.slider.*') || Request::routeIs('admin.berita.*') || Request::routeIs('admin.video.*') || Request::routeIs('admin.agenda.*') || Request::routeIs('admin.galeri.*');
        $isProfilActive = Request::routeIs('admin.profil.*');
        $isAkademisiActive = Request::routeIs('admin.dosen.*');
        $isPenelitianActive = Request::routeIs('admin.penelitian.*') || Request::routeIs('admin.pengumuman-penelitian.*');
        $isAbdimasActive = Request::routeIs('admin.abdimas.*') || Request::routeIs('admin.pengumuman-abdimas.*');
        $isPublikasiActive = Request::routeIs('admin.publikasi.*');
        $isDokumenActive = Request::routeIs('admin.dokumen.*');
        $isKontakActive = Request::routeIs('admin.kontak.*');
    @endphp

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/logo_ibinew_putih.png') }}" alt="Logo KKG">
            <div>
                <h5>Administrasi LPPM</h5>
                <span class="small text-white-50" style="font-size: 0.75rem;">IBI Kwik Kian Gie</span>
            </div>
        </div>

        <div class="sidebar-menu-wrapper">
            <ul class="sidebar-menu">
                <li class="sidebar-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="fa-solid fa-chart-pie"></i> <span>Ringkasan</span>
                    </a>
                </li>

                <div class="menu-title">Navigasi Website</div>

                <!-- 1. Beranda Dropdown -->
                <li class="sidebar-item has-submenu {{ $isBerandaActive ? 'open active' : '' }}">
                    <a class="sidebar-link submenu-toggle">
                        <i class="fa-solid fa-house"></i> <span>Beranda</span>
                        <i class="fa-solid fa-chevron-down ms-auto arrow-icon"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="{{ Request::routeIs('admin.slider.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.slider.index') }}"><i class="fa-solid fa-images me-2"></i> Slider Banner</a>
                        </li>
                        <li class="{{ Request::routeIs('admin.berita.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.berita.index') }}"><i class="fa-solid fa-newspaper me-2"></i> Berita Utama</a>
                        </li>
                        <li class="{{ Request::routeIs('admin.video.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.video.index') }}"><i class="fa-solid fa-circle-play me-2"></i> Video YouTube</a>
                        </li>
                        <li class="{{ Request::routeIs('admin.agenda.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.agenda.index') }}"><i class="fa-solid fa-calendar-days me-2"></i> Agenda Kegiatan</a>
                        </li>
                        <li class="{{ Request::routeIs('admin.galeri.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.galeri.index') }}"><i class="fa-solid fa-image me-2"></i> Galeri Foto</a>
                        </li>
                    </ul>
                </li>

                <!-- 2. Profil -->
                <li class="sidebar-item {{ $isProfilActive ? 'active' : '' }}">
                    <a href="{{ route('admin.profil.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-building"></i> <span>Profil Lembaga</span>
                    </a>
                </li>

                <!-- 3. Akademisi / Dosen -->
                <li class="sidebar-item {{ $isAkademisiActive ? 'active' : '' }}">
                    <a href="{{ route('admin.dosen.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-graduation-cap"></i> <span>Akademisi (Dosen)</span>
                    </a>
                </li>

                <!-- 4. Penelitian -->
                <li class="sidebar-item {{ $isPenelitianActive ? 'active' : '' }}">
                    <a href="{{ route('admin.penelitian.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-flask"></i> <span>Penelitian</span>
                    </a>
                </li>

                <!-- 5. Abdimas -->
                <li class="sidebar-item {{ $isAbdimasActive ? 'active' : '' }}">
                    <a href="{{ route('admin.abdimas.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-users-line"></i> <span>Abdimas</span>
                    </a>
                </li>

                <!-- 6. Publikasi -->
                <li class="sidebar-item {{ $isPublikasiActive ? 'active' : '' }}">
                    <a href="{{ route('admin.publikasi.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-book-open"></i> <span>Publikasi Ilmiah</span>
                    </a>
                </li>

                <!-- 7. Dokumen -->
                <li class="sidebar-item {{ $isDokumenActive ? 'active' : '' }}">
                    <a href="{{ route('admin.dokumen.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-file-pdf"></i> <span>Dokumen &amp; Unduhan</span>
                    </a>
                </li>

                <!-- 8. Kontak -->
                <li class="sidebar-item {{ $isKontakActive ? 'active' : '' }}">
                    <a href="{{ route('admin.kontak.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-address-book"></i> <span>Kontak &amp; Layanan</span>
                    </a>
                </li>

                <div class="menu-title">Tautan Luar</div>

                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                        <i class="fa-solid fa-globe"></i> <span>Lihat Website</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="p-3 border-top border-secondary border-opacity-10 bg-black bg-opacity-20">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 py-2.5 border-0 bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center gap-2" style="font-weight: 600; border-radius: 10px; font-size: 0.9rem;">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar Sesi
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Top Navbar -->
        <header class="top-navbar">
            <h4>@yield('header_title', 'Ringkasan Dashboard')</h4>
            <div class="admin-profile">
                <i class="fa-solid fa-user-shield"></i>
                <div class="d-none d-sm-block">
                    <div class="small fw-bold">{{ Auth::user()->name }}</div>
                    <div class="text-white-50 small" style="font-size: 0.72rem; letter-spacing: 0.5px;">ADMINISTRATOR LPPM</div>
                </div>
            </div>
        </header>

        <!-- Content Body -->
        <main class="content-body">
            @if(session('success'))
                <div class="alert alert-premium-success mb-4 d-flex align-items-center gap-3">
                    <i class="fa-solid fa-circle-check fs-4"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Collapsible Sidebar Submenus
        document.querySelectorAll('.submenu-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const item = this.parentElement;
                
                // Toggle open class
                item.classList.toggle('open');
            });
        });
    </script>
</body>
</html>
