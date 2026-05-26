@extends('layouts.admin')

@section('title', 'Kelola Halaman Profil - LPPM')
@section('header_title', 'Kelola Halaman Profil')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Sub-Halaman Profil</h5>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th style="width: 150px;">Gambar Latar</th>
                    <th>Judul Halaman</th>
                    <th>Ringkasan Konten</th>
                    <th>Terakhir Diperbarui</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($profiles as $profil)
                    <tr>
                        <td>
                            @if($profil->image)
                                <img src="{{ asset($profil->image) }}" alt="{{ $profil->title }}" class="rounded border border-secondary border-opacity-10" style="width: 120px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-secondary bg-opacity-20 rounded border border-secondary border-opacity-10 d-flex align-items-center justify-content-center" style="width: 120px; height: 60px;">
                                    <i class="fa-solid fa-image text-white-50"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold text-white">
                            {{ $profil->title }}
                        </td>
                        <td class="text-white-50 small">
                            {{ Str::limit(strip_tags($profil->content), 120) }}
                        </td>
                        <td class="text-white-50 small">{{ $profil->updated_at->format('d M Y, H:i') }} WIB</td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.profil.edit', $profil->id) }}" class="btn btn-sm btn-primary px-3 py-1.5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit Konten
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-white-50">Belum ada data sub-halaman profil.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
