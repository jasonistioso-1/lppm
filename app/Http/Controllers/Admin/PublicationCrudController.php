<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationCrudController extends Controller
{
    private $types = [
        'Jurnal',
        'Prosiding',
        'Artikel Ilmiah'
    ];

    public function index()
    {
        $publications = Publication::orderBy('year', 'desc')->paginate(10);
        return view('admin.publikasi.index', compact('publications'));
    }

    public function create()
    {
        $types = $this->types;
        return view('admin.publikasi.create', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'type' => 'required|string|in:Jurnal,Prosiding,Artikel Ilmiah',
            'author' => 'required|string|max:255',
            'journal_name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 2),
            'link' => 'nullable|url|max:255',
            'status' => 'required|string|in:published,draft',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        Publication::create($data);

        return redirect()->route('admin.publikasi.index')->with('success', 'Data Publikasi Ilmiah baru berhasil ditambahkan.');
    }

    public function edit(Publication $publikasi)
    {
        $types = $this->types;
        return view('admin.publikasi.edit', compact('publikasi', 'types'));
    }

    public function update(Request $request, Publication $publikasi)
    {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'type' => 'required|string|in:Jurnal,Prosiding,Artikel Ilmiah',
            'author' => 'required|string|max:255',
            'journal_name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 2),
            'link' => 'nullable|url|max:255',
            'status' => 'required|string|in:published,draft',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $publikasi->update($data);

        return redirect()->route('admin.publikasi.index')->with('success', 'Data Publikasi Ilmiah berhasil diperbarui.');
    }

    public function destroy(Publication $publikasi)
    {
        $publikasi->delete();
        return redirect()->route('admin.publikasi.index')->with('success', 'Data Publikasi Ilmiah berhasil dihapus.');
    }
}
