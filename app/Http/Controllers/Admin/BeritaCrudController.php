<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'content' => 'required|string',
            'status' => 'required|string|in:published,draft',
        ], [
            'image_file.max' => 'Ukuran gambar maksimal adalah 1 MB (1024 KB).',
        ]);

        if ($request->hasFile('image_file')) {
            $data['image'] = $this->uploadAndCompressImage($request->file('image_file'), 'images');
        } else {
            $data['image'] = 'assets/images/pkm2024.jpeg'; // Default placeholder
        }

        // Set slug
        $data['slug'] = Str::slug($data['title']);

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita baru berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'content' => 'required|string',
            'status' => 'required|string|in:published,draft',
        ], [
            'image_file.max' => 'Ukuran gambar maksimal adalah 1 MB (1024 KB).',
        ]);

        if ($request->hasFile('image_file')) {
            // Delete old image if exists and not default
            if ($berita->image && $berita->image !== 'assets/images/pkm2024.jpeg' && File::exists(public_path($berita->image))) {
                File::delete(public_path($berita->image));
            }
            $data['image'] = $this->uploadAndCompressImage($request->file('image_file'), 'images');
        } else {
            $data['image'] = $berita->image;
        }

        $data['slug'] = Str::slug($data['title']);

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

    private function uploadAndCompressImage($file, $directory)
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        // Save in public/assets/images directory directly for frontend assets paths
        $destinationPath = public_path('assets/' . $directory);
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        $targetFile = $destinationPath . '/' . $filename;

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
                return 'assets/' . $directory . '/' . $filename;
            }

            // Resize if width is larger than 1000px (landscape banner)
            $width = imagesx($image);
            $height = imagesy($image);
            if ($width > 1000) {
                $newWidth = 1000;
                $newHeight = floor($height * ($newWidth / $width));
                $tmp = imagecreatetruecolor($newWidth, $newHeight);
                
                imagealphablending($tmp, false);
                imagesavealpha($tmp, true);
                
                imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($image);
                $image = $tmp;
            }

            // Save compressed
            if ($info['mime'] == 'image/png') {
                imagepng($image, $targetFile, 7);
            } else {
                imagejpeg($image, $targetFile, 75);
            }
            imagedestroy($image);

            return 'assets/' . $directory . '/' . $filename;
        } catch (\Exception $e) {
            $file->move($destinationPath, $filename);
            return 'assets/' . $directory . '/' . $filename;
        }
    }
}
