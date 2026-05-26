<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DosenCrudController extends Controller
{
    private $prodiList = [
        'Akuntansi',
        'Manajemen',
        'Ilmu Komunikasi',
        'Ilmu Administrasi Bisnis',
        'Sistem Informasi',
        'Teknik Informatika',
    ];

    public function index()
    {
        $dosens = Dosen::orderBy('name', 'asc')->paginate(10);
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
            'nidn' => 'required|string|max:20|unique:lecturers,nidn',
            'prodi' => 'required|string|max:255',
            'keahlian' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'google_scholar' => 'nullable|string|max:255',
            'sinta' => 'nullable|string|max:255',
            'scopus' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
        ], [
            'photo.max' => 'Ukuran foto maksimal adalah 1 MB (1024 KB).',
            'nidn.unique' => 'NIDN ini sudah terdaftar.',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadAndCompressImage($request->file('photo'), 'dosen');
        } else {
            $data['photo'] = null;
        }

        Dosen::create($data);

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen baru berhasil ditambahkan.');
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
            'nidn' => 'required|string|max:20|unique:lecturers,nidn,' . $dosen->id,
            'prodi' => 'required|string|max:255',
            'keahlian' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'google_scholar' => 'nullable|string|max:255',
            'sinta' => 'nullable|string|max:255',
            'scopus' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
        ], [
            'photo.max' => 'Ukuran foto maksimal adalah 1 MB (1024 KB).',
            'nidn.unique' => 'NIDN ini sudah terdaftar.',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($dosen->photo && File::exists(public_path($dosen->photo))) {
                File::delete(public_path($dosen->photo));
            }
            $data['photo'] = $this->uploadAndCompressImage($request->file('photo'), 'dosen');
        } else {
            $data['photo'] = $dosen->photo;
        }

        $dosen->update($data);

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        if ($dosen->photo && File::exists(public_path($dosen->photo))) {
            File::delete(public_path($dosen->photo));
        }
        $dosen->delete();
        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }

    private function uploadAndCompressImage($file, $directory)
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('storage/' . $directory);
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        $targetFile = $destinationPath . '/' . $filename;

        // Try using GD library to compress
        try {
            $info = getimagesize($file->getRealPath());
            if ($info['mime'] == 'image/jpeg') {
                $image = imagecreatefromjpeg($file->getRealPath());
            } elseif ($info['mime'] == 'image/gif') {
                $image = imagecreatefromgif($file->getRealPath());
            } elseif ($info['mime'] == 'image/png') {
                $image = imagecreatefrompng($file->getRealPath());
            } elseif ($info['mime'] == 'image/webp') {
                $image = imagecreatefromwebp($file->getRealPath());
            } else {
                $file->move($destinationPath, $filename);
                return 'storage/' . $directory . '/' . $filename;
            }

            // Resize if width is larger than 600px (standard portrait ratio for lecturers)
            $width = imagesx($image);
            $height = imagesy($image);
            if ($width > 600) {
                $newWidth = 600;
                $newHeight = floor($height * ($newWidth / $width));
                $tmp = imagecreatetruecolor($newWidth, $newHeight);
                
                // Keep transparency
                imagealphablending($tmp, false);
                imagesavealpha($tmp, true);
                
                imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($image);
                $image = $tmp;
            }

            // Save compressed
            if ($info['mime'] == 'image/png') {
                imagepng($image, $targetFile, 7); // Compression 0-9
            } else {
                imagejpeg($image, $targetFile, 75); // Quality 75%
            }
            imagedestroy($image);

            return 'storage/' . $directory . '/' . $filename;
        } catch (\Exception $e) {
            // Fallback standard move
            $file->move($destinationPath, $filename);
            return 'storage/' . $directory . '/' . $filename;
        }
    }
}
