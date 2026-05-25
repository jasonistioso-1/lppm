<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin LPPM</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at 10% 20%, rgb(4, 18, 48) 0%, rgb(17, 33, 71) 90.2%);
            color: #ffffff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .glow-node {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: 1;
            opacity: 0.5;
        }

        .glow-1 {
            width: 300px;
            height: 300px;
            background: #0072ff;
            top: 10%;
            left: 20%;
        }

        .glow-2 {
            width: 400px;
            height: 400px;
            background: #00c6ff;
            bottom: 10%;
            right: 20%;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 440px;
            z-index: 10;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.8s ease;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo img {
            max-width: 150px;
            filter: drop-shadow(0 0 12px rgba(0, 198, 255, 0.4));
        }

        .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border-radius: 10px;
            padding: 12px 18px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #00c6ff;
            box-shadow: 0 0 0 0.25rem rgba(0, 198, 255, 0.25);
            color: #ffffff;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 8px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #0072ff 0%, #00c6ff 100%);
            border: none;
            color: #ffffff;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            margin-top: 15px;
            box-shadow: 0 8px 20px rgba(0, 114, 255, 0.3);
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0, 198, 255, 0.5);
            background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
        }

        .back-link {
            text-align: center;
            margin-top: 25px;
        }

        .back-link a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: #00c6ff;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="glow-node glow-1"></div>
    <div class="glow-node glow-2"></div>

    <div class="login-card">
        <div class="login-logo">
            <img src="{{ asset('assets/logo_ibinew_putih.png') }}" alt="Logo IBI KKG">
            <h4 class="mt-3 font-weight-bold">ADMINISTRASI LPPM</h4>
            <p class="text-white-50 small">Institut Bisnis dan Informatika Kwik Kian Gie</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger border-0 bg-danger bg-opacity-25 text-white small rounded-3 mb-4">
                <ul class="mb-0 ps-3">
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
                <input type="email" name="email" id="email" class="form-control" placeholder="admin@lppm.com" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" style="background-color: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.1);">
                <label class="form-check-label small text-white-50" for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-submit">MASUK</button>
        </form>

        <div class="back-link">
            <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda LPPM</a>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
