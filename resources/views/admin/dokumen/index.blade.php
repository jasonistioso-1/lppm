@extends('layouts.admin')

@section('title', 'Kelola Dokumen LPPM - LPPM')
@section('header_title', 'Kelola Dokumen LPPM')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Dokumen Panduan &amp; Template Unduhan</h5>
    <a href="{{ route('admin.dokumen.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Dokumen
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th>Judul Dokumen</th>
                    <th>Kategori / Kelompok</th>
                    <th>Deskripsi</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $dokumen)
                    <tr>
                        <td class="fw-semibold text-white">
                            {{ $dokumen->title }}
                        </td>
                        <td><span class="badge bg-secondary bg-opacity-20 text-white px-2.5 py-1.5 border border-secondary border-opacity-10">{{ $dokumen->category }}</span></td>
                        <td class="text-white-50 small">{{ Str::limit($dokumen->description, 100) }}</td>
                        <td>
                            @if($dokumen->file)
                                <a href="{{ asset('assets/docs/' . $dokumen->file) }}" target="_blank" class="btn btn-sm btn-outline-info px-2.5 py-1.5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-download me-1"></i> Unduh
                                </a>
                            @else
                                <span class="text-white-50 small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($dokumen->status === 'published')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1">Diterbitkan</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-20 px-2 py-1">Draf</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.dokumen.edit', $dokumen->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.dokumen.destroy', $dokumen->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
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
                        <td colspan="6" class="text-center py-5 text-white-50">Belum ada data dokumen panduan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $documents->links() }}
</div>
@endsection
