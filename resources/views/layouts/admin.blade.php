<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard LPPM')</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0a1128;
            --bg-sidebar: #0f1c3f;
            --accent-primary: #0072ff;
            --accent-secondary: #00c6ff;
            --border-light: rgba(255, 255, 255, 0.08);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-dark);
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            z-index: 100;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 30px 24px;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand img {
            max-height: 40px;
        }

        .sidebar-brand h5 {
            font-weight: 700;
            margin: 0;
            background: linear-gradient(135deg, #ffffff 0%, rgba(255, 255, 255, 0.7) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-menu {
            padding: 25px 15px;
            list-style: none;
            margin: 0;
            flex-grow: 1;
        }

        .sidebar-item {
            margin-bottom: 8px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .sidebar-link:hover, .sidebar-item.active .sidebar-link {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar-item.active .sidebar-link {
            background: linear-gradient(135deg, rgba(0, 114, 255, 0.2) 0%, rgba(0, 198, 255, 0.2) 100%);
            border: 1px solid rgba(0, 198, 255, 0.2);
            color: #00c6ff;
        }

        /* Main Content Styling */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .top-navbar {
            height: 80px;
            background: rgba(15, 28, 63, 0.4);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
        }

        .top-navbar h4 {
            font-weight: 600;
            margin: 0;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-profile i {
            font-size: 1.5rem;
            color: #00c6ff;
        }

        .content-body {
            padding: 40px;
            flex-grow: 1;
            overflow-y: auto;
        }

        /* Premium Components */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            padding: 30px;
            margin-bottom: 30px;
        }

        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-light);
            color: #ffffff;
            border-radius: 8px;
            padding: 10px 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #00c6ff;
            box-shadow: 0 0 0 0.25rem rgba(0, 198, 255, 0.25);
            color: #ffffff;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.8);
            margin-bottom: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0072ff 0%, #00c6ff 100%);
            border: none;
            font-weight: 600;
            padding: 10px 24px;
            box-shadow: 0 6px 15px rgba(0, 114, 255, 0.25);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(0, 198, 255, 0.4);
            background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
        }

        .btn-outline-light {
            border: 1px solid var(--border-light);
            background: rgba(255,255,255,0.03);
            font-weight: 500;
            padding: 10px 24px;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background: rgba(255,255,255,0.08);
            border-color: rgba(255,255,255,0.2);
        }

        .table-premium {
            color: #ffffff;
            margin: 0;
        }

        .table-premium th {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.6);
            border-bottom: 1px solid var(--border-light);
            padding: 18px 15px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-premium td {
            border-bottom: 1px solid var(--border-light);
            padding: 18px 15px;
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .table-premium tr:hover td {
            background: rgba(255, 255, 255, 0.01);
        }

        .pagination {
            margin-top: 20px;
        }

        .page-link {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-light);
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #00c6ff;
            border-color: rgba(255,255,255,0.2);
        }

        .page-item.active .page-link {
            background: #0072ff;
            border-color: #0072ff;
            color: #ffffff;
        }

        .page-item.disabled .page-link {
            background: rgba(255,255,255,0.01);
            border-color: var(--border-light);
            color: rgba(255,255,255,0.3);
        }

        /* Alert styling */
        .alert-premium-success {
            background: rgba(40, 167, 69, 0.1);
            border: 1px solid rgba(40, 167, 69, 0.2);
            color: #28a745;
            border-radius: 12px;
            padding: 16px 20px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('assets/logo_ibinew_putih.png') }}" alt="Logo">
            <div>
                <h5>LPPM Admin</h5>
                <span class="small text-white-50">IBI Kwik Kian Gie</span>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="sidebar-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="fa-solid fa-chart-pie"></i> Ringkasan
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('admin.dosen.*') ? 'active' : '' }}">
                <a href="{{ route('admin.dosen.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-graduation-cap"></i> Kelola Akademisi
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs('admin.berita.*') ? 'active' : '' }}">
                <a href="{{ route('admin.berita.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-newspaper"></i> Kelola Berita
                </a>
            </li>
            <li class="sidebar-item mt-4">
                <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                    <i class="fa-solid fa-globe"></i> Lihat Website
                </a>
            </li>
        </ul>

        <div class="p-3 border-top border-secondary border-opacity-10">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 py-2 border-0 bg-danger bg-opacity-10 text-danger" style="font-weight: 600; border-radius: 10px;">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Keluar
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
                <i class="fa-solid fa-circle-user"></i>
                <div class="d-none d-sm-block">
                    <div class="small fw-semibold">{{ Auth::user()->name }}</div>
                    <div class="text-white-50 small" style="font-size: 0.75rem;">Administrator</div>
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
</body>
</html>
