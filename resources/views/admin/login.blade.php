<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrasi LPPM | IBI Kwik Kian Gie</title>
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
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .login-wrapper {
            height: 100vh;
            display: flex;
            width: 100%;
        }

        /* Sisi Kiri - Kampus Banner (60%) */
        .banner-side {
            width: 60%;
            position: relative;
            background-image: url('{{ asset("assets/images/1.jpeg") }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
        }

        .banner-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(5, 11, 26, 0.9) 0%, rgba(15, 28, 63, 0.8) 100%);
            z-index: 1;
        }

        .banner-content {
            position: relative;
            z-index: 2;
            max-width: 550px;
            text-align: left;
            animation: fadeInLeft 0.8s ease;
        }

        .banner-logo {
            max-height: 70px;
            margin-bottom: 30px;
            filter: drop-shadow(0 0 15px rgba(0, 198, 255, 0.3));
        }

        .banner-content h1 {
            font-size: 2.8rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #ffffff 0%, rgba(255, 255, 255, 0.7) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .banner-content p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            margin-bottom: 40px;
        }

        /* Glassmorphism Badge Info */
        .glass-badge {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .glass-badge i {
            font-size: 2rem;
            color: var(--accent-secondary);
        }

        .glass-badge div h6 {
            margin: 0;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .glass-badge div p {
            margin: 0;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.5);
        }

        /* Sisi Kanan - Form Login (40%) */
        .form-side {
            width: 40%;
            background-color: #080f24;
            border-left: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            position: relative;
            z-index: 5;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.3);
        }

        .form-container {
            max-width: 380px;
            width: 100%;
            margin: 0 auto;
            animation: fadeInRight 0.8s ease;
        }

        .form-header {
            margin-bottom: 35px;
        }

        .form-header h3 {
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 8px;
            color: #ffffff;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }

        /* Premium Form Styling */
        .form-label {
            font-size: 0.85rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 8px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group-custom i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            z-index: 10;
            transition: color 0.3s ease;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-light);
            color: #ffffff;
            border-radius: 12px;
            padding: 14px 16px 14px 45px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--accent-secondary);
            box-shadow: 0 0 15px rgba(0, 198, 255, 0.2);
            color: #ffffff;
        }

        .form-control:focus + i {
            color: var(--accent-secondary);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            border: none;
            color: #ffffff;
            font-weight: 600;
            padding: 14px;
            border-radius: 12px;
            width: 100%;
            margin-top: 15px;
            font-size: 1rem;
            box-shadow: 0 8px 25px rgba(0, 114, 255, 0.35);
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(0, 198, 255, 0.5);
            background: linear-gradient(135deg, var(--accent-secondary) 0%, var(--accent-primary) 100%);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-link a:hover {
            color: var(--accent-secondary);
        }

        /* Responsive Mobile Layout */
        @media (max-width: 991px) {
            .banner-side {
                display: none;
            }
            .form-side {
                width: 100%;
                padding: 40px 20px;
            }
            body {
                overflow: auto;
            }
        }

        /* Animations */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <!-- Sisi Kiri: Banner Kampus KKG (60%) -->
        <div class="banner-side">
            <div class="banner-content">
                <img src="{{ asset('assets/logo_ibinew_putih.png') }}" alt="Logo IBI KKG" class="banner-logo">
                <h1>Sistem Administrasi Portal LPPM</h1>
                <p>
                    Selamat datang di Panel Kontrol Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Institut Bisnis dan Informatika Kwik Kian Gie. Kelola semua konten web secara cepat, adaptif, dan aman.
                </p>

                <div class="glass-badge">
                    <i class="fa-solid fa-shield-halved"></i>
                    <div>
                        <h6>Akses Administrator Resmi</h6>
                        <p>Seluruh aktivitas login dicatat demi keamanan sistem internal.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sisi Kanan: Form Login Premium (40%) -->
        <div class="form-side">
            <div class="form-container">
                <div class="form-header">
                    <h3>Selamat Datang</h3>
                    <p>Silakan masuk menggunakan akun administrator Anda</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger small rounded-3 mb-4 p-3 d-flex align-items-start gap-2">
                        <i class="fa-solid fa-circle-exclamation mt-1"></i>
                        <ul class="mb-0 ps-2" style="list-style: none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <div class="input-group-custom">
                            <input type="email" name="email" id="email" class="form-control" placeholder="nama@lppm.com" value="{{ old('email') }}" required autofocus>
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label for="password" class="form-label mb-0">Kata Sandi</label>
                        </div>
                        <div class="input-group-custom">
                            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                            <i class="fa-solid fa-lock"></i>
                        </div>
                    </div>

                    <div class="mb-4 form-check d-flex align-items-center gap-2">
                        <input type="checkbox" class="form-check-input bg-transparent border-secondary" id="remember" name="remember">
                        <label class="form-check-label small text-white-50 mb-0" for="remember" style="user-select: none;">Ingat saya di perangkat ini</label>
                    </div>

                    <button type="submit" class="btn btn-submit">MASUK KE PANEL</button>
                </form>

                <div class="back-link">
                    <a href="{{ route('home') }}">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Website
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
