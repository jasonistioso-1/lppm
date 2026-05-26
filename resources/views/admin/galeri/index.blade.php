@extends('layouts.admin')

@section('title', 'Kelola Galeri Foto - LPPM')
@section('header_title', 'Kelola Galeri Foto')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Galeri Dokumentasi Foto</h5>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Foto
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th style="width: 150px;">Foto</th>
                    <th>Judul Dokumentasi</th>
                    <th>Deskripsi / Catatan</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $galeri)
                    <tr>
                        <td>
                            @if($galeri->image)
                                <img src="{{ asset($galeri->image) }}" alt="{{ $galeri->title }}" class="rounded border border-secondary border-opacity-10" style="width: 120px; height: 80px; object-fit: cover;">
                            @else
                                <div class="bg-secondary bg-opacity-20 rounded border border-secondary border-opacity-10 d-flex align-items-center justify-content-center" style="width: 120px; height: 80px;">
                                    <i class="fa-solid fa-image text-white-50"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold text-white">{{ $galeri->title }}</td>
                        <td class="text-white-50 small">{{ Str::limit($galeri->description, 100) }}</td>
                        <td>
                            @if($galeri->status === 'active')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1">Aktif</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-20 px-2 py-1">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto dokumentasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                        <i class="fa-solid fa-trash-can text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-white-50">Belum ada data galeri dokumentasi foto.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $galleries->links() }}
</div>
@endsection
