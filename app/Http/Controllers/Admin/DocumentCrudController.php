<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocumentCrudController extends Controller
{
    private $categories = [
        'Panduan',
        'Template',
        'Unduhan'
    ];

    public function index()
    {
        $documents = Document::orderBy('id', 'desc')->paginate(10);
        return view('admin.dokumen.index', compact('documents'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.dokumen.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Panduan,Template,Unduhan',
            'doc_file' => 'required|file|mimes:pdf,docx,doc,xls,xlsx,zip,rar|max:5120',
            'description' => 'nullable|string',
            'status' => 'required|string|in:published,draft',
        ], [
            'doc_file.required' => 'Berkas dokumen wajib diunggah.',
            'doc_file.max' => 'Ukuran berkas dokumen maksimal adalah 5 MB.',
        ]);

        if ($request->hasFile('doc_file')) {
            $file = $request->file('doc_file');
            // Keep original extension but sanitize filename
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('assets/docs');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $data['file'] = $filename; // Store filename in database
        }

        Document::create($data);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen baru berhasil ditambahkan.');
    }

    public function edit(Document $dokumen)
    {
        $categories = $this->categories;
        return view('admin.dokumen.edit', compact('dokumen', 'categories'));
    }

    public function update(Request $request, Document $dokumen)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Panduan,Template,Unduhan',
            'doc_file' => 'nullable|file|mimes:pdf,docx,doc,xls,xlsx,zip,rar|max:5120',
            'description' => 'nullable|string',
            'status' => 'required|string|in:published,draft',
        ], [
            'doc_file.max' => 'Ukuran berkas dokumen maksimal adalah 5 MB.',
        ]);

        if ($request->hasFile('doc_file')) {
            // Delete old file if exists
            $oldPath = public_path('assets/docs/' . $dokumen->file);
            if ($dokumen->file && File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('doc_file');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('assets/docs');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $data['file'] = $filename;
        } else {
            $data['file'] = $dokumen->file;
        }

        $dokumen->update($data);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(Document $dokumen)
    {
        $filePath = public_path('assets/docs/' . $dokumen->file);
        if ($dokumen->file && File::exists($filePath)) {
            File::delete($filePath);
        }
        $dokumen->delete();
        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
