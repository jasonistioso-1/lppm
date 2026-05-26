<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CommunityServiceCrudController extends Controller
{
    public function index()
    {
        $abdimases = CommunityService::orderBy('year', 'desc')->paginate(10);
        return view('admin.abdimas.index', compact('abdimases'));
    }

    public function create()
    {
        return view('admin.abdimas.create');
    }

    public function store(Request $request)
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

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        CommunityService::create($data);

        return redirect()->route('admin.abdimas.index')->with('success', 'Data Abdimas baru berhasil ditambahkan.');
    }

    public function edit(CommunityService $abdimas)
    {
        return view('admin.abdimas.edit', compact('abdimas'));
    }

    public function update(Request $request, CommunityService $abdimas)
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
            if ($abdimas->document && File::exists(public_path($abdimas->document))) {
                File::delete(public_path($abdimas->document));
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
            $data['document'] = $abdimas->document;
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $abdimas->update($data);

        return redirect()->route('admin.abdimas.index')->with('success', 'Data Abdimas berhasil diperbarui.');
    }

    public function destroy(CommunityService $abdimas)
    {
        if ($abdimas->document && File::exists(public_path($abdimas->document))) {
            File::delete(public_path($abdimas->document));
        }
        $abdimas->delete();
        return redirect()->route('admin.abdimas.index')->with('success', 'Data Abdimas berhasil dihapus.');
    }
}
