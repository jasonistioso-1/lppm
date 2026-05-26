@extends('layouts.admin')

@section('title', 'Kelola Agenda Kegiatan - LPPM')
@section('header_title', 'Kelola Agenda Kegiatan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Agenda Kegiatan LPPM</h5>
    <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Agenda
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th>Judul Agenda / Kegiatan</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Waktu (Mulai - Selesai)</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agendas as $agenda)
                    <tr>
                        <td class="fw-semibold text-white">
                            {{ $agenda->title }}
                            @if($agenda->description)
                                <div class="text-white-50 small mt-1" style="font-size: 0.78rem;">{{ Str::limit($agenda->description, 100) }}</div>
                            @endif
                        </td>
                        <td><span class="badge bg-secondary bg-opacity-20 text-white-50 px-2.5 py-1.5 border border-secondary border-opacity-10">{{ $agenda->location }}</span></td>
                        <td class="text-white-50 small">{{ date('d M Y', strtotime($agenda->event_date)) }}</td>
                        <td class="text-white-50 small">{{ $agenda->start_time }} - {{ $agenda->end_time }}</td>
                        <td>
                            @if($agenda->status === 'published')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1">Diterbitkan</span>
                            @else
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-20 px-2 py-1">Draf</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda kegiatan ini?')">
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
                        <td colspan="6" class="text-center py-5 text-white-50">Belum ada data agenda kegiatan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $agendas->links() }}
</div>
@endsection
