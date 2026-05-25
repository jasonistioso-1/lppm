<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function skema()
    {
        return view('penelitian.skema');
    }

    public function dataPenelitian()
    {
        $researches = Research::where('status', 'published')->orderBy('year', 'desc')->get();
        return view('penelitian.data-penelitian', compact('researches'));
    }

    public function pengumuman()
    {
        $announcements = Announcement::where('status', 'published')->orderBy('published_at', 'desc')->get();
        return view('penelitian.pengumuman', compact('announcements'));
    }
}
