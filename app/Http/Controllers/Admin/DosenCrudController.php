<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenCrudController extends Controller
{
    private $prodiList = [
        'Manajemen',
        'Magister Manajemen',
        'Akuntansi',
        'Magister Akuntansi',
        'Teknik Informatika',
        'Sistem Informasi',
        'Ilmu Komunikasi',
        'Administrasi Bisnis'
    ];

    public function index()
    {
        $dosens = Dosen::orderBy('nama', 'asc')->paginate(10);
        return view('admin.dosen.index', compact('dosens'));
    }

    public function create()
    {
        $prodis = $this->prodiList;
        return view('admin.dosen.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'gsName' => 'nullable|string|max:255',
            'gsUser' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string|max:255',
        ]);

        Dosen::create($data);

        return redirect()->route('admin.dosen.index')->with('success', 'Akademisi berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        $prodis = $this->prodiList;
        return view('admin.dosen.edit', compact('dosen', 'prodis'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'gsName' => 'nullable|string|max:255',
            'gsUser' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string|max:255',
        ]);

        $dosen->update($data);

        return redirect()->route('admin.dosen.index')->with('success', 'Akademisi berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('admin.dosen.index')->with('success', 'Akademisi berhasil dihapus.');
    }
}
