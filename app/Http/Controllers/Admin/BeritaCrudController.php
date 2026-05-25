<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaCrudController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('id', 'desc')->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'link' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_.-]/', '', $file->getClientOriginalName());
            $file->move(public_path('assets/images'), $filename);
            $data['image'] = 'assets/images/' . $filename;
        } else {
            $data['image'] = 'assets/images/pkm2024.jpeg'; // Default placeholder
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'link' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            // Delete old image if it exists and is not default
            if ($berita->image && $berita->image !== 'assets/images/pkm2024.jpeg' && File::exists(public_path($berita->image))) {
                File::delete(public_path($berita->image));
            }

            $file = $request->file('image_file');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_.-]/', '', $file->getClientOriginalName());
            $file->move(public_path('assets/images'), $filename);
            $data['image'] = 'assets/images/' . $filename;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image && $berita->image !== 'assets/images/pkm2024.jpeg' && File::exists(public_path($berita->image))) {
            File::delete(public_path($berita->image));
        }

        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
