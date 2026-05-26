<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ResearchCrudController extends Controller
{
    public function index()
    {
        $researches = Research::orderBy('year', 'desc')->paginate(10);
        return view('admin.penelitian.index', compact('researches'));
    }

    public function create()
    {
        return view('admin.penelitian.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'scheme' => 'required|string|max:255',
            'lecturer_name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 2),
            'abstract' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:5120', // Max 5MB for PDF documents
            'status' => 'required|string|in:published,draft',
        ], [
            'pdf_file.max' => 'Ukuran dokumen PDF maksimal adalah 5 MB.',
            'pdf_file.mimes' => 'Berkas harus berupa dokumen dengan format PDF.',
        ]);

        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('assets/docs');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $data['document'] = 'assets/docs/' . $filename;
        } else {
            $data['document'] = null;
        }

        // Set slug
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        Research::create($data);

        return redirect()->route('admin.penelitian.index')->with('success', 'Data Penelitian baru berhasil ditambahkan.');
    }

    public function edit(Research $penelitian)
    {
        return view('admin.penelitian.edit', compact('penelitian'));
    }

    public function update(Request $request, Research $penelitian)
    {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'scheme' => 'required|string|max:255',
            'lecturer_name' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 2),
            'abstract' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:5120',
            'status' => 'required|string|in:published,draft',
        ], [
            'pdf_file.max' => 'Ukuran dokumen PDF maksimal adalah 5 MB.',
            'pdf_file.mimes' => 'Berkas harus berupa dokumen dengan format PDF.',
        ]);

        if ($request->hasFile('pdf_file')) {
            if ($penelitian->document && File::exists(public_path($penelitian->document))) {
                File::delete(public_path($penelitian->document));
            }
            $file = $request->file('pdf_file');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('assets/docs');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $data['document'] = 'assets/docs/' . $filename;
        } else {
            $data['document'] = $penelitian->document;
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $penelitian->update($data);

        return redirect()->route('admin.penelitian.index')->with('success', 'Data Penelitian berhasil diperbarui.');
    }

    public function destroy(Research $penelitian)
    {
        if ($penelitian->document && File::exists(public_path($penelitian->document))) {
            File::delete(public_path($penelitian->document));
        }
        $penelitian->delete();
        return redirect()->route('admin.penelitian.index')->with('success', 'Data Penelitian berhasil dihapus.');
    }
}
