<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfilePageCrudController extends Controller
{
    public function index()
    {
        $profiles = ProfilePage::orderBy('id', 'asc')->paginate(10);
        return view('admin.profil.index', compact('profiles'));
    }

    public function edit(ProfilePage $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, ProfilePage $profil)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
        ], [
            'image_file.max' => 'Ukuran gambar maksimal adalah 1 MB (1024 KB).',
        ]);

        if ($request->hasFile('image_file')) {
            // Delete old image if exists
            if ($profil->image && File::exists(public_path($profil->image))) {
                File::delete(public_path($profil->image));
            }
            $data['image'] = $this->uploadAndCompressImage($request->file('image_file'), 'images');
        } else {
            $data['image'] = $profil->image;
        }

        $profil->update($data);

        return redirect()->route('admin.profil.index')->with('success', 'Halaman Profil berhasil diperbarui.');
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

            // Portrait or landscape inner image, resize to max 850px width
            $width = imagesx($image);
            $height = imagesy($image);
            if ($width > 850) {
                $newWidth = 850;
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
