@extends('layouts.admin')

@section('title', 'Kelola Kontak & Layanan - LPPM')
@section('header_title', 'Kelola Kontak & Layanan')

@section('content')
<div class="mb-4">
    <h5 class="fw-bold">Ubah Informasi Kontak &amp; Jam Layanan LPPM</h5>
    <p class="text-white-50 small">Informasi ini ditampilkan di halaman hubungi kami dan footer situs web LPPM.</p>
</div>

<div class="glass-card">
    @if (session('success'))
        <div class="alert alert-success border-0 bg-success bg-opacity-25 text-white small rounded-3 mb-4">
            <i class="fa-solid fa-circle-check me-1"></i> {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-0 bg-danger bg-opacity-25 text-white small rounded-3 mb-4">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kontak.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="lppm@kwikkiangie.ac.id" value="{{ old('email', $contact->email) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="service_hours" class="form-label">Jam Layanan LPPM <span class="text-danger">*</span></label>
                <input type="text" name="service_hours" id="service_hours" class="form-control" placeholder="Senin - Jumat: 08:30 - 16:30 WIB" value="{{ old('service_hours', $contact->service_hours) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Nomor Telepon Kantor <span class="text-danger">*</span></label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="(021) 4508999" value="{{ old('phone', $contact->phone) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="whatsapp" class="form-label">Nomor WhatsApp LPPM <span class="text-danger">*</span></label>
                <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="082122355330" value="{{ old('whatsapp', $contact->whatsapp) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat Lengkap Kantor <span class="text-danger">*</span></label>
            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Jl. Boulevard Bukit Gading Raya Blok A, Kelapa Gading..." required>{{ old('address', $contact->address) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="google_maps_embed" class="form-label">Tautan / Iframe Google Maps Embed (Opsional)</label>
            <input type="text" name="google_maps_embed" id="google_maps_embed" class="form-control" placeholder="https://www.google.com/maps/embed?..." value="{{ old('google_maps_embed', $contact->google_maps_embed) }}">
            <span class="text-white-50 d-block mt-1" style="font-size: 0.75rem;"><i class="fa-solid fa-circle-info me-1"></i> Masukkan tautan `src` dari iframe embed yang dibagikan dari Google Maps.</span>
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2.5">Simpan Perubahan Kontak</button>
    </form>
</div>
@endsection
