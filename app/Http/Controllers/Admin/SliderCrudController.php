<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderCrudController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,webp|max:1024',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'sort_order' => 'required|integer',
        ], [
            'image_file.required' => 'Gambar slider wajib diunggah.',
            'image_file.max' => 'Ukuran gambar maksimal adalah 1 MB (1024 KB).',
        ]);

        if ($request->hasFile('image_file')) {
            $data['image'] = $this->uploadAndCompressImage($request->file('image_file'), 'images');
        }

        Slider::create($data);

        return redirect()->route('admin.slider.index')->with('success', 'Slider Banner baru berhasil ditambahkan.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'sort_order' => 'required|integer',
        ], [
            'image_file.max' => 'Ukuran gambar maksimal adalah 1 MB (1024 KB).',
        ]);

        if ($request->hasFile('image_file')) {
            // Delete old image if exists
            if ($slider->image && File::exists(public_path($slider->image))) {
                File::delete(public_path($slider->image));
            }
            $data['image'] = $this->uploadAndCompressImage($request->file('image_file'), 'images');
        } else {
            $data['image'] = $slider->image;
        }

        $slider->update($data);

        return redirect()->route('admin.slider.index')->with('success', 'Slider Banner berhasil diperbarui.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image && File::exists(public_path($slider->image))) {
            File::delete(public_path($slider->image));
        }
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider Banner berhasil dihapus.');
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

            // Slider images are wide banners, resize to max 1400px width
            $width = imagesx($image);
            $height = imagesy($image);
            if ($width > 1400) {
                $newWidth = 1400;
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
