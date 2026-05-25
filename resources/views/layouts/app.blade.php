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
