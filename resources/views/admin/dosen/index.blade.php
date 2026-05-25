@extends('layouts.admin')

@section('title', 'Kelola Akademisi - LPPM')
@section('header_title', 'Kelola Akademisi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Akademisi</h5>
    <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Akademisi
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Program Studi</th>
                    <th>Bidang Keahlian</th>
                    <th>Google Scholar ID</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dosens as $dosen)
                    <tr>
                        <td class="fw-semibold text-white">{{ $dosen->nama }}</td>
                        <td><span class="badge bg-secondary bg-opacity-20 text-white-50 px-2.5 py-1.5 border border-secondary border-opacity-10">{{ $dosen->prodi }}</span></td>
                        <td class="text-white-50 small">{{ $dosen->keahlian ?? '-' }}</td>
                        <td>
                            @if($dosen->gsUser)
                                <a href="https://scholar.google.com/citations?user={{ $dosen->gsUser }}" target="_blank" class="text-info text-decoration-none small">
                                    <i class="fa-solid fa-graduation-cap me-1"></i> {{ $dosen->gsUser }}
                                </a>
                            @else
                                <span class="text-white-50 small">-</span>
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
                        <td colspan="5" class="text-center py-5 text-white-50">Belum ada data akademisi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $dosens->links() }}
</div>
@endsection
