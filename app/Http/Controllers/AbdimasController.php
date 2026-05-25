<?php

namespace App\Http\Controllers;

use App\Models\CommunityService;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AbdimasController extends Controller
{
    public function skema()
    {
        return view('abdimas.skema');
    }

    public function dataAbdimas()
    {
        $abdimas = CommunityService::where('status', 'published')->orderBy('year', 'desc')->get();
        return view('abdimas.data-abdimas', compact('abdimas'));
    }

    public function pengumuman()
    {
        $announcements = Announcement::where('status', 'published')->orderBy('published_at', 'desc')->get();
        return view('abdimas.pengumuman', compact('announcements'));
    }
}
