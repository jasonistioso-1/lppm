<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>@yield('title', 'LPPM IBI KKG')</title>

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
  <!-- Global Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/css/shared.css') }}" />
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
  
  <!-- Custom Page CSS -->
  @yield('page-css')
</head>
<body>
  @auth
    <!-- Floating Admin Visual Edit Bar -->
    <div class="admin-visual-bar" style="background: linear-gradient(90deg, #0f2b5c 0%, #0072ff 100%); color: #fff; padding: 12px 24px; font-size: 0.85rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 99999; box-shadow: 0 4px 15px rgba(0,0,0,0.3); border-bottom: 2px solid #00c6ff;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-circle-user" style="color: #00c6ff; font-size: 1.1rem;"></i> 
            <span>Mode Edit Visual LPPM Aktif (Halo, {{ Auth::user()->name }})</span>
        </div>
        <div style="display: flex; align-items: center; gap: 15px;">
            <span style="font-size: 0.75rem; background: rgba(255,255,255,0.1); padding: 4px 10px; border-radius: 12px; color: rgba(255,255,255,0.8);"><i class="fa-solid fa-eye-slash"></i> Hanya Anda yang dapat melihat panel & tombol ini</span>
            <a href="{{ route('admin.dashboard') }}" target="_blank" style="color: #fff; text-decoration: none; background: rgba(255,255,255,0.15); padding: 6px 14px; border-radius: 6px; transition: all 0.2s; font-size: 0.8rem; font-weight: 700; border: 1px solid rgba(255,255,255,0.1);" onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                <i class="fa-solid fa-gauge"></i> Masuk Dashboard Utama
            </a>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline; margin: 0;">
                @csrf
                <button type="submit" style="color: #ff4d4d; border: none; background: none; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 5px; font-size: 0.8rem; padding: 6px;"><i class="fa-solid fa-right-from-bracket"></i> Keluar</button>
            </form>
        </div>
    </div>
  @endauth

  <!-- Navbar Component -->
  <x-navbar />

  <!-- Main Content Body -->
  @yield('content')

  <!-- Footer Component -->
  <x-footer />

  <!-- Global Javascript -->
  <script src="{{ asset('main.js') }}"></script>

  <!-- Custom Page JS -->
  @yield('page-js')
</body>
</html>
