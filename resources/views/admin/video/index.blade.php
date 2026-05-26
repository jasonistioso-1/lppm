@extends('layouts.admin')

@section('title', 'Kelola Video YouTube - LPPM')
@section('header_title', 'Kelola Video YouTube')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Daftar Video YouTube Beranda</h5>
    <a href="{{ route('admin.video.create') }}" class="btn btn-primary btn-sm px-3 py-2 rounded-3">
        <i class="fa-solid fa-plus me-1"></i> Tambah Video
    </a>
</div>

<div class="glass-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-premium align-middle">
            <thead>
                <tr>
                    <th style="width: 240px;">Video Player</th>
                    <th>Judul Video</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th class="text-end" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($videos as $video)
                    <tr>
                        <td>
                            <div class="ratio ratio-16x9 rounded overflow-hidden border border-secondary border-opacity-10" style="max-width: 220px;">
                                <iframe src="{{ $video->url }}" title="{{ $video->title }}" allowfullscreen></iframe>
                            </div>
                        </td>
                        <td class="fw-semibold text-white">
                            {{ $video->title }}
                        </td>
                        <td class="text-white-50 small">
                            {{ Str::limit($video->description, 100) }}
                        </td>
                        <td>
                            @if($video->status === 'active')
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-2 py-1">Aktif</span>
                            @else
                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-20 px-2 py-1">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.video.edit', $video->id) }}" class="btn btn-sm btn-outline-light px-2.5 py-1.5 border-0 bg-white bg-opacity-5" style="border-radius: 8px;">
                                    <i class="fa-solid fa-pen-to-square text-info"></i>
                                </a>
                                <form action="{{ route('admin.video.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
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
                        <td colspan="5" class="text-center py-5 text-white-50">Belum ada data video YouTube.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $videos->links() }}
</div>
@endsection
