@extends('layouts.admin')

@section('title', 'Kelola Laporan Abdimas - LPPM')
@section('header_title', 'Kelola Laporan Abdimas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Laporan Pengabdian Masyarakat (Abdimas)</h5>
    <a href="{{ route('admin.abdimas.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Abdimas
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th>Judul Abdimas</th>
                    <th>Skema</th>
                    <th>Ketua Pelaksana (Dosen)</th>
                    <th>Tahun</th>
                    <th>Berkas PDF</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($abdimases as $abdimas)
                    <tr>
                        <td class="fw-semibold text-white">
                            {{ $abdimas->title }}
                        </td>
                        <td><span class="badge bg-secondary bg-opacity-20 text-white-50 px-2.5 py-1.5 border border-secondary border-opacity-10">{{ $abdimas->scheme }}</span></td>
                        <td class="text-white fw-semibold">{{ $abdimas->lecturer_name }}</td>
                        <td class="text-white-50 small">{{ $abdimas->year }}</td>
                        <td>
                            @if($abdimas->document)
                                <a href="{{ asset($abdimas->document) }}" target="_blank" class="btn btn-sm btn-outline-danger px-2.5 py-1.5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-file-pdf me-1"></i> PDF
                                </a>
                            @else
                                <span class="text-white-50 small">-</span>
                            @endif
                        </td>
                        <td>
                            @if($abdimas->status === 'published')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1">Diterbitkan</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-20 px-2 py-1">Draf</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.abdimas.edit', $abdimas->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.abdimas.destroy', $abdimas->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data laporan abdimas ini?')">
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
                        <td colspan="7" class="text-center py-5 text-white-50">Belum ada data laporan pengabdian masyarakat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $abdimases->links() }}
</div>
@endsection
