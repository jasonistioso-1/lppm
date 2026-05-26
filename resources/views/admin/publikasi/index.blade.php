@extends('layouts.admin')

@section('title', 'Kelola Publikasi Ilmiah - LPPM')
@section('header_title', 'Kelola Publikasi Ilmiah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Publikasi Jurnal &amp; Artikel Ilmiah</h5>
    <a href="{{ route('admin.publikasi.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Publikasi
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th>Judul Publikasi</th>
                    <th>Jenis</th>
                    <th>Nama Penulis</th>
                    <th>Nama Jurnal / Penerbit</th>
                    <th>Tahun</th>
                    <th>Tautan Luar</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($publications as $publikasi)
                    <tr>
                        <td class="fw-semibold text-white">
                            {{ $publikasi->title }}
                        </td>
                        <td><span class="badge bg-secondary bg-opacity-20 text-white px-2.5 py-1.5 border border-secondary border-opacity-10">{{ $publikasi->type }}</span></td>
                        <td class="text-white fw-semibold">{{ $publikasi->author }}</td>
                        <td class="text-white-50 small">{{ $publikasi->journal_name }}</td>
                        <td class="text-white-50 small">{{ $publikasi->year }}</td>
                        <td>
                            @if($publikasi->link)
                                <a href="{{ $publikasi->link }}" target="_blank" class="btn btn-sm btn-outline-info px-2.5 py-1.5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Buka Link
                                </a>
                            @else
                                <span class="text-white-50 small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($publikasi->status === 'published')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1">Diterbitkan</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-20 px-2 py-1">Draf</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.publikasi.edit', $publikasi->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.publikasi.destroy', $publikasi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data publikasi ilmiah ini?')">
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
                        <td colspan="8" class="text-center py-5 text-white-50">Belum ada data publikasi ilmiah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $publications->links() }}
</div>
@endsection
