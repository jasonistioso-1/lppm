<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryCrudController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(10);
        return view('admin.galeri.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,webp|max:1024',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ], [
            'image_file.required' => 'Gambar galeri wajib diunggah.',
            'image_file.max' => 'Ukuran gambar maksimal adalah 1 MB (1024 KB).',
        ]);

        if ($request->hasFile('image_file')) {
            $data['image'] = $this->uploadAndCompressImage($request->file('image_file'), 'images');
        }

        Gallery::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri Foto baru berhasil ditambahkan.');
    }

    public function edit(Gallery $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Gallery $galeri)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ], [
            'image_file.max' => 'Ukuran gambar maksimal adalah 1 MB (1024 KB).',
        ]);

        if ($request->hasFile('image_file')) {
            // Delete old image
            if ($galeri->image && File::exists(public_path($galeri->image))) {
                File::delete(public_path($galeri->image));
            }
            $data['image'] = $this->uploadAndCompressImage($request->file('image_file'), 'images');
        } else {
            $data['image'] = $galeri->image;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri Foto berhasil diperbarui.');
    }

    public function destroy(Gallery $galeri)
    {
        if ($galeri->image && File::exists(public_path($galeri->image))) {
            File::delete(public_path($galeri->image));
        }
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri Foto berhasil dihapus.');
    }

    private function uploadAndCompressImage($file, $directory)
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
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

            // Gallery images, resize to max 1000px width
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
