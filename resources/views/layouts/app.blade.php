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

  <style>
    /* CSS for hiding/showing admin visual elements based on active toggle class */
    .admin-visual-edit-btn, 
    .admin-edit-overlay,
    .admin-edit-card-header {
      display: none !important;
    }
    
    body.admin-edit-mode-active .admin-visual-edit-btn,
    body.admin-edit-mode-active .admin-edit-overlay {
      display: inline-flex !important;
    }
    
    body.admin-edit-mode-active .admin-edit-card-header {
      display: flex !important;
    }
  </style>
</head>
<body>
  @auth
    <!-- Floating Admin Visual Edit Bar -->
    <div class="admin-visual-bar" style="background: linear-gradient(90deg, #0f2b5c 0%, #0072ff 100%); color: #fff; padding: 12px 24px; font-size: 0.85rem; font-weight: 600; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 99999; box-shadow: 0 4px 15px rgba(0,0,0,0.3); border-bottom: 2px solid #00c6ff;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-circle-user" style="color: #00c6ff; font-size: 1.1rem;"></i> 
            <span>Mode Admin LPPM Aktif (Halo, {{ Auth::user()->name }})</span>
        </div>
        <div style="display: flex; align-items: center; gap: 15px;">
            <!-- Panduan Edit Button -->
            <button onclick="openQuickGuide()" style="color: #fff; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); padding: 6px 14px; border-radius: 20px; font-size: 0.78rem; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 6px; transition: all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.12)'">
                <i class="fa-solid fa-circle-question" style="color: #4ade80;"></i> Panduan Edit LPPM
            </button>

            <!-- Mode Visual Toggle -->
            <div style="display: flex; align-items: center; gap: 8px; background: rgba(0,0,0,0.3); padding: 4px 10px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.15);">
                <span style="font-size: 0.78rem; color: rgba(255,255,255,0.85); font-weight: bold;">Mode Edit Visual:</span>
                <button id="toggleEditModeBtn" onclick="toggleAdminEditMode()" style="background: #e0e0e0; color: #333; border: none; padding: 4px 12px; border-radius: 12px; font-size: 0.72rem; font-weight: bold; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 4px;">
                    <i class="fa-solid fa-toggle-off" style="color: #666;"></i> NON-AKTIF
                </button>
            </div>

            <a href="{{ route('admin.dashboard') }}" target="_blank" style="color: #fff; text-decoration: none; background: rgba(255,255,255,0.15); padding: 6px 14px; border-radius: 6px; transition: all 0.2s; font-size: 0.8rem; font-weight: 700; border: 1px solid rgba(255,255,255,0.1);" onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                <i class="fa-solid fa-gauge"></i> Masuk Dashboard Utama
            </a>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline; margin: 0;">
                @csrf
                <button type="submit" style="color: #ff4d4d; border: none; background: none; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 5px; font-size: 0.8rem; padding: 6px;"><i class="fa-solid fa-right-from-bracket"></i> Keluar</button>
            </form>
        </div>
    </div>

    <!-- Quick Guide Modal (Panduan Edit LPPM) -->
    <div id="quickGuideModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); backdrop-filter: blur(8px); z-index: 999999; justify-content: center; align-items: center; padding: 20px;">
        <div style="background: #0f2b5c; color: #fff; width: 100%; max-width: 900px; max-height: 85vh; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); border: 2px solid #00c6ff; overflow: hidden; display: flex; flex-direction: column;">
            <!-- Modal Header -->
            <div style="background: linear-gradient(90deg, #0f2b5c 0%, #0072ff 100%); padding: 20px; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #00c6ff;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-circle-info" style="color: #00c6ff; font-size: 1.4rem;"></i>
                    <h3 style="margin: 0; font-size: 1.25rem; font-weight: 700; color: #fff;">Panduan Cepat Pengelolaan LPPM IBI KKG</h3>
                </div>
                <button onclick="closeQuickGuide()" style="background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.color='#ff4d4d'" onmouseout="this.style.color='#fff'">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <div style="padding: 24px; overflow-y: auto; flex-grow: 1; font-family: 'Outfit', sans-serif;">
                <p style="font-size: 0.95rem; line-height: 1.6; margin-top: 0; color: rgba(255,255,255,0.85);">
                    Selamat datang di menu bantuan LPPM! Anda dapat mengedit tulisan, kalimat, serta foto website secara langsung melalui dua cara:
                </p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 25px;">
                    <div style="background: rgba(255,255,255,0.05); padding: 16px; border-radius: 10px; border-left: 4px solid #00c6ff;">
                        <h4 style="margin: 0 0 8px 0; color: #00c6ff; font-size: 0.95rem;"><i class="fa-solid fa-eye"></i> 1. Mode Edit Visual (Di Halaman)</h4>
                        <p style="margin: 0; font-size: 0.85rem; line-height: 1.5; color: rgba(255,255,255,0.75);">
                            Aktifkan Mode Edit Visual menjadi <strong style="color: #0072ff; background: #fff; padding: 2px 6px; border-radius: 4px;">AKTIF</strong> di bar atas, lalu telusuri website. Klik tombol oranye <strong>✏️ Edit</strong> di sebelah elemen yang ingin diubah. Sistem akan langsung mengarahkan Anda ke form pengeditan item tersebut di panel admin.
                        </p>
                    </div>
                    <div style="background: rgba(255,255,255,0.05); padding: 16px; border-radius: 10px; border-left: 4px solid #4ade80;">
                        <h4 style="margin: 0 0 8px 0; color: #4ade80; font-size: 0.95rem;"><i class="fa-solid fa-table-columns"></i> 2. Menu CRUD Administrator</h4>
                        <p style="margin: 0; font-size: 0.85rem; line-height: 1.5; color: rgba(255,255,255,0.75);">
                            Klik tombol <strong>Masuk Dashboard Utama</strong> untuk masuk ke panel lengkap. Di sana Anda dapat mengelola semua entitas secara terorganisir dengan tabel-tabel pencarian yang rapi dan detail.
                        </p>
                    </div>
                </div>

                <h4 style="margin: 0 0 12px 0; color: #fff; font-size: 1.05rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 6px;">Peta Direktori Penyuntingan LPPM</h4>
                
                <!-- Beautiful Guide Table -->
                <table style="width: 100%; border-collapse: collapse; font-size: 0.85rem; text-align: left; color: #fff;">
                    <thead>
                        <tr style="background: rgba(0, 114, 255, 0.2); border-bottom: 2px solid #00c6ff;">
                            <th style="padding: 12px; color: #00c6ff;">Bagian Website</th>
                            <th style="padding: 12px; color: #00c6ff;">Nama Menu di Panel CRUD</th>
                            <th style="padding: 12px; color: #00c6ff;">Panduan & Ketentuan Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.02);">
                            <td style="padding: 12px; font-weight: 600; color: #fff;">Slider Banner</td>
                            <td style="padding: 12px; color: #4ade80; font-weight: 600;">Slider Banner</td>
                            <td style="padding: 12px; color: rgba(255,255,255,0.7);">Unggah foto landscape resolusi tinggi (rekomendasi: 1200x600px).</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.08);">
                            <td style="padding: 12px; font-weight: 600; color: #fff;">Tentang Kami / Visi Misi</td>
                            <td style="padding: 12px; color: #4ade80; font-weight: 600;">Halaman Profil</td>
                            <td style="padding: 12px; color: rgba(255,255,255,0.7);">Penyuntingan teks terformat (Rich Text Editor) untuk kalimat visi/misi.</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.02);">
                            <td style="padding: 12px; font-weight: 600; color: #fff;">Berita & Pengumuman</td>
                            <td style="padding: 12px; color: #4ade80; font-weight: 600;">Berita / Pengumuman</td>
                            <td style="padding: 12px; color: rgba(255,255,255,0.7);">Gunakan rasio thumbnail persegi panjang (rekomendasi: 400x250px).</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.08);">
                            <td style="padding: 12px; font-weight: 600; color: #fff;">Dosen & Akademisi</td>
                            <td style="padding: 12px; color: #4ade80; font-weight: 600;">Akademisi / Dosen</td>
                            <td style="padding: 12px; color: rgba(255,255,255,0.7);">Pas foto formal dosen (3x4 atau 4x6) dengan format JPG/PNG transparan.</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.02);">
                            <td style="padding: 12px; font-weight: 600; color: #fff;">Direktori Jurnal</td>
                            <td style="padding: 12px; color: #4ade80; font-weight: 600;">Publikasi / Jurnal</td>
                            <td style="padding: 12px; color: rgba(255,255,255,0.7);">Upload gambar cover jurnal resmi KKG serta tautkan link OJS aktif.</td>
                        </tr>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.08);">
                            <td style="padding: 12px; font-weight: 600; color: #fff;">Galeri Video</td>
                            <td style="padding: 12px; color: #4ade80; font-weight: 600;">Video</td>
                            <td style="padding: 12px; color: rgba(255,255,255,0.7);">Masukkan url embed resmi dari YouTube (misal: youtube.com/embed/xxxx).</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Modal Footer -->
            <div style="background: rgba(0,0,0,0.2); padding: 15px 20px; display: flex; justify-content: flex-end; border-top: 1px solid rgba(255,255,255,0.1);">
                <button onclick="closeQuickGuide()" style="background: #0072ff; color: #fff; border: none; padding: 8px 20px; border-radius: 6px; font-weight: bold; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.background='#005bcc'" onmouseout="this.style.background='#0072ff'">Tutup Panduan</button>
            </div>
        </div>
    </div>

    <!-- Admin Edit Mode JavaScript -->
    <script>
        function toggleAdminEditMode() {
            const body = document.body;
            const btn = document.getElementById('toggleEditModeBtn');
            if (body.classList.contains('admin-edit-mode-active')) {
                body.classList.remove('admin-edit-mode-active');
                localStorage.setItem('adminEditMode', 'inactive');
                btn.innerHTML = '<i class="fa-solid fa-toggle-off" style="color: #666;"></i> NON-AKTIF';
                btn.style.background = '#e0e0e0';
                btn.style.color = '#333';
            } else {
                body.classList.add('admin-edit-mode-active');
                localStorage.setItem('adminEditMode', 'active');
                btn.innerHTML = '<i class="fa-solid fa-toggle-on" style="color: #00c6ff;"></i> AKTIF';
                btn.style.background = '#0072ff';
                btn.style.color = '#fff';
            }
        }

        function openQuickGuide() {
            document.getElementById('quickGuideModal').style.display = 'flex';
        }

        function closeQuickGuide() {
            document.getElementById('quickGuideModal').style.display = 'none';
        }

        // On page load, initialize based on localStorage
        document.addEventListener('DOMContentLoaded', function() {
            const editMode = localStorage.getItem('adminEditMode');
            const btn = document.getElementById('toggleEditModeBtn');
            if (btn) {
                if (editMode === 'active') {
                    document.body.classList.add('admin-edit-mode-active');
                    btn.innerHTML = '<i class="fa-solid fa-toggle-on" style="color: #00c6ff;"></i> AKTIF';
                    btn.style.background = '#0072ff';
                    btn.style.color = '#fff';
                } else {
                    document.body.classList.remove('admin-edit-mode-active');
                    btn.innerHTML = '<i class="fa-solid fa-toggle-off" style="color: #666;"></i> NON-AKTIF';
                    btn.style.background = '#e0e0e0';
                    btn.style.color = '#333';
                }
            }
        });
    </script>
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
