@extends('layouts.admin')

@section('title', 'Kelola Berita - LPPM')
@section('header_title', 'Kelola Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Berita Slider</h5>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Berita
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th style="width: 80px;">Poster</th>
                    <th>Judul Berita</th>
                    <th>Tanggal / Batas</th>
                    <th>Jenis Aksi Klik</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $berita)
                    <tr>
                        <td>
                            @if($berita->image)
                                <img src="{{ asset($berita->image) }}" alt="Poster" class="rounded border border-secondary border-opacity-10" style="width: 60px; height: 45px; object-fit: cover;">
                            @else
                                <div class="bg-secondary bg-opacity-20 rounded border border-secondary border-opacity-10 d-flex align-items-center justify-content-center" style="width: 60px; height: 45px;">
                                    <i class="fa-solid fa-image text-white-50"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold text-white">{{ $berita->title }}</td>
                        <td class="text-white-50 small">{{ $berita->date }}</td>
                        <td>
                            @if($berita->content)
                                <span class="badge bg-success bg-opacity-20 text-success border border-success border-opacity-10">Buka Modal Pop-up</span>
                            @elseif($berita->link)
                                <span class="badge bg-info bg-opacity-20 text-info border border-info border-opacity-10">Redirect ke Halaman</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-20 text-white-50 border border-secondary border-opacity-10">Tanpa Aksi</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
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
                        <td colspan="5" class="text-center py-5 text-white-50">Belum ada data berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $beritas->links() }}
</div>
@endsection
