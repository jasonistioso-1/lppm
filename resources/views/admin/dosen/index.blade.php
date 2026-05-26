@extends('layouts.admin')

@section('title', 'Kelola Akademisi - LPPM')
@section('header_title', 'Kelola Akademisi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Akademisi / Dosen</h5>
    <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Akademisi
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th style="width: 80px;">Foto</th>
                    <th>Nama Lengkap &amp; NIDN</th>
                    <th>Program Studi</th>
                    <th>Bidang Keahlian</th>
                    <th>Email</th>
                    <th>ID Akademis (GS/Sinta/Scopus)</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dosens as $dosen)
                    <tr>
                        <td>
                            @if($dosen->photo)
                                <img src="{{ asset($dosen->photo) }}" alt="{{ $dosen->name }}" class="rounded" style="width: 50px; height: 60px; object-fit: cover; border: 1px solid var(--border-light);">
                            @else
                                <div class="rounded d-flex align-items-center justify-content-center bg-white bg-opacity-5" style="width: 50px; height: 60px; border: 1px solid var(--border-light);">
                                    <i class="fa-solid fa-user-tie text-white-50 fs-4"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold text-white">{{ $dosen->name }}</div>
                            <div class="small text-white-50" style="font-size: 0.78rem;">NIDN: {{ $dosen->nidn ?? '-' }}</div>
                        </td>
                        <td><span class="badge bg-secondary bg-opacity-20 text-white-50 px-2.5 py-1.5 border border-secondary border-opacity-10">{{ $dosen->department }}</span></td>
                        <td class="text-white-50 small">{{ $dosen->expertise ?? '-' }}</td>
                        <td class="text-white-50 small">{{ $dosen->email ?? '-' }}</td>
                        <td>
                            <div class="small">
                                <strong>GS:</strong> {{ $dosen->google_scholar ?? '-' }}<br>
                                <strong>Sinta:</strong> {{ $dosen->sinta ?? '-' }}<br>
                                <strong>Scopus:</strong> {{ $dosen->scopus ?? '-' }}
                            </div>
                        </td>
                        <td>
                            @if($dosen->status == 'active')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1">Aktif</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-20 px-2 py-1">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.dosen.edit', $dosen->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akademisi ini?')">
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
                        <td colspan="8" class="text-center py-5 text-white-50">Belum ada data akademisi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $dosens->links() }}
</div>
@endsection
