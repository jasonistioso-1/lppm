@extends('layouts.admin')

@section('title', 'Kelola Laporan Penelitian - LPPM')
@section('header_title', 'Kelola Laporan Penelitian')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Laporan Hasil Penelitian Dosen</h5>
    <a href="{{ route('admin.penelitian.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Penelitian
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th>Judul Penelitian</th>
                    <th>Skema</th>
                    <th>Ketua Peneliti (Dosen)</th>
                    <th>Tahun</th>
                    <th>Berkas PDF</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($researches as $penelitian)
                    <tr>
                        <td class="fw-semibold text-white">
                            {{ $penelitian->title }}
                        </td>
                        <td><span class="badge bg-secondary bg-opacity-20 text-white-50 px-2.5 py-1.5 border border-secondary border-opacity-10">{{ $penelitian->scheme }}</span></td>
                        <td class="text-white fw-semibold">{{ $penelitian->lecturer_name }}</td>
                        <td class="text-white-50 small">{{ $penelitian->year }}</td>
                        <td>
                            @if($penelitian->document)
                                <a href="{{ asset($penelitian->document) }}" target="_blank" class="btn btn-sm btn-outline-danger px-2.5 py-1.5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-file-pdf me-1"></i> PDF
                                </a>
                            @else
                                <span class="text-white-50 small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($penelitian->status === 'published')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1">Diterbitkan</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-20 px-2 py-1">Draf</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.penelitian.edit', $penelitian->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.penelitian.destroy', $penelitian->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data laporan penelitian ini?')">
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
                        <td colspan="7" class="text-center py-5 text-white-50">Belum ada data laporan penelitian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $researches->links() }}
</div>
@endsection
