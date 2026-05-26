<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoCrudController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(10);
        return view('admin.video.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ]);

        // Convert standard youtube link to embed link if needed
        $data['url'] = $this->formatYoutubeUrl($data['url']);

        Video::create($data);

        return redirect()->route('admin.video.index')->with('success', 'Video YouTube baru berhasil ditambahkan.');
    }

    public function edit(Video $video)
    {
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ]);

        $data['url'] = $this->formatYoutubeUrl($data['url']);

        $video->update($data);

        return redirect()->route('admin.video.index')->with('success', 'Video YouTube berhasil diperbarui.');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.video.index')->with('success', 'Video YouTube berhasil dihapus.');
    }

    private function formatYoutubeUrl($url)
    {
        // Parse youtube video id
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $match)) {
            $youtube_id = $match[1];
            return 'https://www.youtube.com/embed/' . $youtube_id;
        }
        return $url;
    }
}
